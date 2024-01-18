<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Tax;
use App\Models\City;
use App\Models\Order;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\PaymentMethod;
use App\Models\ProductStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Claims\Custom;
use Illuminate\Support\Facades\DB;


class PosController extends Controller
{
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.pos.index');
        $products    = Product::where('product_status', '=', 'published')->where('status', 1)->lazy();
        $customers   = Customer::lazy();
        $taxes       = Tax::where('status', '=', 1)->lazy();
        $countries   = Country::where('status', '=', 1)->get();
        $cities      = City::where('status', '=', 1)->lazy();
        $ordersFrom  = Order::orderFrom();
        $orders_from = $ordersFrom['order_from'];

        $time_now = Carbon::now()->toDateTimeString();
        $coupons = Coupon::where(function ($query) use ($time_now) {
                        $query->where('status', 1)
                            ->where('type', 'invoice_base')
                            ->where('start_date', '<', $time_now)
                            ->where('end_date', '>', $time_now)
                            ->orderBy('created_at', 'desc');
                        })->get();
        $payment_methods = PaymentMethod::where('status',1)->get();
        return view('backend.pos.index', ['categories' => Category::tree()], compact('products', 'customers', 'taxes', 'countries', 'cities', 'orders_from', 'coupons', 'payment_methods'));
    }

    public function addressByCustomer($id)
    {
        $customer_addresses = CustomerAddress::where('customer_id', $id)->with('customers', 'countries', 'cities')->get();
        return json_encode($customer_addresses);
    }
    
    public function storeCustomer(Request $request) {
        $request->user('admin')->authorizePermission('app.pos.index');
        $admin_id = Auth::guard('admin')->user()->id;

        $customer = Customer::create([
            'name'       => $request->name,
            'phone'      => $request->mobile,
            'email'      => $request->email,
            'created_by' => $admin_id
        ]);

        if($customer) {
            CustomerAddress::create([
                'customer_id'   => $customer->id,
                'country_id'    => $request->country_id, 
                'city_id'       => $request->city_id, 
                'address'       => $request->address
            ]);
        }

        $notification = array(
            'message' => 'Klienti u krijua me sukses!',
            'alert-type' => 'success'
        );
        return redirect()->route('app.pos.index')->with($notification);
    }

    public function storeOrder(Request $request)
    {
        $request->user('admin')->authorizePermission('app.pos.index');
        $admin_id = Auth::guard('admin')->user()->id;

        if($request->has('address_id') && $request->address_id != ''){
            $customer_address = CustomerAddress::where('id', $request->address_id)->first();
                $customer_id = $customer_address->customers->id;
                $name    = $customer_address->customers->name;
                $address = $customer_address->address;
                $city    = $customer_address->city_id;
                $country = $customer_address->country_id;
                $phone   = $customer_address->customers->phone;
                $email   = $customer_address->customers->email;
        }else{
            $validator = Validator::make($request->all(), [
                'name'          => 'required|max:190',
                'address'       => 'required',
                'city_id'       => 'required',
                'country_id'    => 'required',
                'mobile'        => 'required',
            ]);
            
            if($validator->fails()) {
                session()->flash('message', 'Porosia nuk mund të krijohet: ' . $validator->messages()->first());
                session()->flash('class', 'danger');
                return redirect()->back();
            }
        }

        $min = pow(10, 6 - 1) ;
        $max = pow(10, 6) - 1;
        $randomFunc =  mt_rand($min, $max);
        $time_now = Carbon::now();
        $order_code = strtotime($time_now).$randomFunc;

        $order = new Order();
        $order->admin_id = $admin_id;
        $order->customer_id = $customer_id ?? null;
        $order->name     = $name ?? $request->name;
        $order->order_code  = $order_code;
        $order->address  = $address ?? $request->address;
        $order->city_id     = $city ?? $request->city_id;
        $order->country_id  = $country ?? $request->country_id;
        $order->zipcode  = 'null';
        $order->mobile   = $phone ?? $request->mobile;
        $order->email    = $email ?? $request->email;
        $order->shipping_charges   = $request->shipping_cost;
        $order->coupon_code        = $request->coupon_code;
        $order->coupon_amount      = $request->coupon_amount;
        $order->payment_method_id  = $request->payment_method_id; 
        $order->grant_total        = $request->grand_total;
        $order->order_from         = $request->order_from;
        $order->save();

        if ($order && $request->has('product_id') && $request->product_id != '')
        {
            
            foreach ($request->product_id as $p => $product)
            {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->user_id  = $admin_id;
                $orderDetail->admin_id = $admin_id;
                $orderDetail->product_id = $request->product_id[$p];
                $orderDetail->variation = $request->variation[$p] ?? null;
                $orderDetail->price = $request->price[$p];
                $orderDetail->tax = $request->tax;
                $orderDetail->shipping_cost = $request->shipping_cost;
                $orderDetail->quantity = $request->quantity[$p];
                $orderDetail->save();
                
                if($orderDetail && !empty($request->product_id[$p]) && !empty($request->variation[$p]))
                { 
                    $product_variation = ProductStock::where('id', $request->variation[$p]);
                    $product_variation->decrement('current_stock', $request->quantity[$p]);
                    
                }elseif($orderDetail && !empty($request->product_id[$p]) && empty($request->variation[$p]))
                {
                    $product_variation = Product::where('id', $request->product_id[$p]);
                    $product_variation->decrement('current_stock', $request->quantity[$p]);
                }

            }
        }
        

        $notification = array(
            'message' => 'Porosia u krijua me success!',
            'alert-type' => 'success'
        );
        return redirect()->route('app.pos.index')->with($notification);
    }

    public function searchPos(Request $request){
        $categories     = Category::tree();
        $customers      = Customer::get();
        $ordersFrom     = Order::orderFrom();
        $orders_from    = $ordersFrom['order_from'];
        $taxes          = Tax::where('status', '=', 1)->lazy();
        $countries      = Country::where('status', '=', 1)->get();
        $cities         = City::where('status', '=', 1)->lazy();
        $time_now       = Carbon::now()->toDateTimeString();
        $coupons        = Coupon::where(function ($query) use ($time_now) {
                        $query->where('status', 1)
                            ->where('type', 'invoice_base')
                            ->where('start_date', '<', $time_now)
                            ->where('end_date', '>', $time_now)
                            ->orderBy('created_at', 'desc');
                        })->get();
        $payment_methods = PaymentMethod::where('status',1)->get();

        $products = Product::where('name', '!=', '')->where('status', 1);
        if(!empty($request->search)) {
           $products->where(('name'), 'LIKE', '%' . $request->search . '%')->orWhere(('sku'), 'LIKE', '%'.$request->search.'%');           
        }
        if(!empty($request->category_id)){
            $chosen_category = Category::where('id', $request->category_id)->first();
            if($chosen_category->parent_id == null) {
                $children_category = Category::where('parent_id', $request->category_id)->pluck('id');
                if(!empty($children_category)) {
                $products->whereIn('category_id', $children_category->toarray())->orWhere('category_id', $request->category_id);
                }
            } else {
                $products->where('category_id', $request->category_id);
            }
        }

        $products = $products->where('product_status', 'published')->get();
        if($products){
            return view('backend.pos.index')->with(['products' => $products, 'categories' => $categories, 'customers' => $customers, 
            'orders_from' => $orders_from, 'taxes' => $taxes, 'countries' => $countries, 'cities' => $cities,
            'coupons' => $coupons, 'payment_methods' => $payment_methods]);
        }
    }
}
