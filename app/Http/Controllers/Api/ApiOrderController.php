<?php

namespace App\Http\Controllers\Api;

use App\Models\Coupon;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Color;
use App\Models\ProductStock;
use App\Models\AttributeValue;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;
use Mail;
use App\Mail\OrderMail;

class ApiOrderController extends Controller
{
    protected function responseWithSuccess($message='', $data=[], $code=200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success'   => true,
            'message'   => $message,
            'data'      => $data,
        ],$code);
    }

    protected function responseWithError($message='', $data=[], $code=null): \Illuminate\Http\JsonResponse
    {
        if ($code==null) {
            $code=400;
        }
        return response()->json([
            'success'   => false,
            'message'   => $message,
            'data'      => $data,
        ],$code);
    }

    public function checkCouponCode(Request $request): \Illuminate\Http\JsonResponse
    {
        $coupon = Coupon::where(['code' => $request->get('coupon_code'), 'status' => 1])->first();
        if (empty($coupon)) {
            return $this->responseWithError('Kodi i kuponit nuk është i saktë', '', '200');
        }

        $now = new DateTime();
        $start_date = new DateTime($coupon->start_date);
        $end_date = new DateTime($coupon->end_date);
        if (!($start_date <= $now && $now <= $end_date)) {
            return $this->responseWithError('Kuponi i vendosur ka skaduar!', '', '200');
        }

        $data = [];
        $data['coupon_product_ids'] = $coupon->product_id;
        $data['coupon_code'] = $coupon->code;
        $data['coupon_type'] = $coupon->type;
        $data['coupon_discount'] = $coupon->discount;
        $data['coupon_discount_type'] = $coupon->discount_type;
        $data['coupon_minimum_shopping'] = $coupon->minimum_shopping;
        $data['coupon_maximum_discount'] = $coupon->maximum_discount;

        return $this->responseWithSuccess('Urime, vlera e kuponit u aplikua!', $data, '200');
    }

    public function orderSubmit(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user_id = null;
            $token = $request->get('token');
            if (!empty($token)) {
                $auth_token = PersonalAccessToken::findToken($token);
                $user = $auth_token->tokenable;
                $user_id = $user->id;
            }

            $min = pow(10, 6 - 1) ;
            $max = pow(10, 6) - 1;
            $randomFunc =  mt_rand($min, $max);
            $time_now = Carbon::now();
            $order_code = strtotime($time_now).$randomFunc;

            $order = new Order();
            $order->user_id = $user_id;
            //$order->admin_id = 0;
            $order->order_code  = $order_code;
            $order->name = $request->get('name') . ' '. $request->get('surname');
            $order->address = $request->get('address');
            $order->address_two = $request->get('address_two');
            $order->city_id = $request->get('city');
            $order->country_id = $request->get('country_id');
            //$order->zipcode = $request->get('zipcode');
            $order->mobile = $request->get('mobile');
            //$order->email = $request->get('email');
            $order->shipping_charges = $request->get('shipping_fee');
            $order->coupon_code = $request->get('coupon_code');
            $order->coupon_amount = $request->get('coupon_amount');
            //$order->status = 0;
            $order->payment_method_id = $request->get('payment_method');
            //$order->payment_gateaway = $request->get('payment_gateaway');
            $order->grant_total = $request->get('grant_total');
            //$order->order_from = $request->get('order_from');
            $order->save();
            $last_inserted_id = $order->id;
            
            foreach ($request->get('items') as $key => $item) {
                $order_details = new OrderDetail();
                $order_details->order_id = $order->id;
                $order_details->user_id = $user_id;
                //$order_details->admin_id = 0;
                $order_details->product_id = $item['id'];
                $order_details->variation = $item['variant'];
                $order_details->price = $item['price'];
                $order_details->tax = 0;
                $order_details->shipping_cost = 0;
                $order_details->quantity = $item['quantity'];
                //$order_details->payment_status = 0;
                $order_details->delivery_status = 0;
                $order_details->shipping_type = 0;
                $order_details->save();
            }
            
        return $this->responseWithSuccess('Urime, porosia juaj u krye me sukses.', '200');

        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), '', '424'); // 424 (Failed Dependency)
        }
    }

    public function sendEmail(Request $request): \Illuminate\Http\JsonResponse 
    {
        // dd($request);
        try {
            $min = pow(10, 6 - 1) ;
            $max = pow(10, 6) - 1;
            $randomFunc =  mt_rand($min, $max);
            $time_now = Carbon::now();
            $order_code = strtotime($time_now).$randomFunc;

            $order_details_email = [];
            foreach ($request->get('items') as $key => $item) {
                $order_details_email['product_id'] = $item['id'];
                $order_details_email['variation'] = $item['variant'];
                $order_details_email['price'] = $item['price'];
                $order_details_email['quantity'] = $item['quantity'];
            }
            $data_email = [
                'order_code'=> $order_code,
                'shipping_charges'=> $request->get('shipping_fee'),
                'coupon_amount'=> $request->get('coupon_amount'),
                'grant_total' => $request->get('grant_total'),
                'order_details' => $order_details_email
            ];
            
            
            \Mail::to('ariola.avdiu.al@gmail.com')->send(new OrderMail($data_email));
            return response()->json(['orderId' => $last_inserted_id], 200); 
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), '', '424'); // 424 (Failed Dependency)
        }
    }

    public function orderByUser($token): \Illuminate\Http\JsonResponse
    {
        $token = PersonalAccessToken::findToken($token);

        if (!$token) {
            $response = [
                'success' => false,
                'message' => 'Unauthorised'
            ];
            return response()->json($response);
        }
        $user = $token->tokenable;
        $orders_by_user = Order::where('user_id',$user->id)->get();
        //$orders_by = Order::find($userId);
        
        $orders = [];
        if(!empty($orders_by_user))
        {
            foreach($orders_by_user as $key => $obu)
            {
                $order_details = [];
                foreach($obu->orderDetails as $key => $obu_details) {
                    if(Str::length($obu_details->variation) > 1) {
                        $obu_attributes = explode('-', $obu_details->variation);
                        $obu_color = Color::where('id', $obu_attributes[0])->pluck('name');
                        $obu_size = AttributeValue::where('id', $obu_attributes[1])->pluck('value');
                    } elseif((Str::length($obu_details->variation) < 2) && ($obu_details->variation != 0)) {
                        $obu_model = ProductStock::where('id', $obu_details->variation)->pluck('variant_ids');
                        $obu_attributes = explode('-', $obu_model);
                        $obu_color = Color::where('id', $obu_attributes[0])->pluck('name');
                        $obu_size = AttributeValue::where('id', $obu_attributes[1])->pluck('value');
                    } else {
                        $obu_color = '';
                        $obu_size = '';
                    }
                    $order_details[$key] = [
                    'id'            => $obu_details->id,
                    'product'       => $obu_details->product->name,
                    'color'         => $obu_color,
                    'size'          => $obu_size,
                    'price'         => (int)$obu_details->price,
                    'quantity'      => $obu_details->quantity,
                    ];
                }

                $orders[$key] = [
                    'id'                => $obu->id,
                    'order_code'        => $obu->order_code,
                    'address'           => $obu->address,
                    'city'              => $obu->city->name,
                    'country'           => $obu->country->name,
                    'shipping_charges'  => (int)$obu->shipping_charges,
                    'coupon_amount'     => (int)$obu->coupon_amount,
                    'grant_total'       => $obu->grant_total,
                    'created_at'        => $obu->created_at,  
                    'order_details'     => $order_details,
                    'order_status_id'   => $obu->order_status_id
                ]; 
            }
        }

        return response()->json([
            "data" => $orders,
            "message" => "Success"
        ], 200);
    }
}
