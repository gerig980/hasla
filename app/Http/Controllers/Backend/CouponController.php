<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use DB;

class CouponController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.coupons.index');
        $coupons = Coupon::where('db_status', 1)->orderBy('created_at', 'desc')->get();

        return view('backend.product.coupons.index', compact('coupons'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user('admin')->authorizePermission('app.coupons.create');
        return view('backend.product.coupons.create');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
            $request->user('admin')->authorizePermission('app.coupons.create');
            $coupon = new Coupon();
            $coupon->title              = $request->title;
            $coupon->type               = $request->type;
            $coupon->code               = $request->code;
            $dates = explode(" - ", $request->date);

            $coupon->start_date         = Carbon::createFromFormat('m-d-Y g:ia', $dates[0]);
            $coupon->end_date           = Carbon::createFromFormat('m-d-Y g:ia', $dates[1]);
            $coupon->discount_type      = $request->discount_type;
            $coupon->discount           = $request->discount;
            $coupon->product_id         = $request->product_id;
            $coupon->minimum_shopping   = $request->minimum_shopping == '' ? 1 : $request->minimum_shopping;
            $coupon->maximum_discount   = $request->maximum_discount == '' ? null : $request->maximum_discount;

            if($request->hasFile('banner')):
                $image_tmp = $request->file('banner');
                if($image_tmp->isValid()):
                       //Get Original Image Name
                       $image_name = $image_tmp->getClientOriginalName();
                       //Get Image Extension
                       $extension = $image_tmp->getClientOriginalExtension();
                       //Generate new image name
                       $imageName = $image_name.'-'.rand(111, 99999).'.'.$extension;
                       //Set path for small, medium, large image
                       $large_image_path = public_path('images/coupons/').$imageName;
                       Image::make($image_tmp)->save($large_image_path);
                       //Save image in db
                       $coupon->banner = $imageName; 
                endif;
            else:
                $coupon->banner = '';
            endif;

            $coupon->save();
            $request['coupon_id'] = $coupon->id;
            $notification = array(
                'message' => 'Kuponi u caktua me sukses!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('coupons.index')->with($notification);
    }

    public function edit(Request $request, $id)
    {
        $request->user('admin')->authorizePermission('app.coupons.create');
        $coupon = Coupon::where('id', $id)->first();
        return view('backend.product.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {   
        $request->user('admin')->authorizePermission('app.coupon.edit');
        if($request->hasFile('banner')):
            $image_tmp = $request->file('banner');
            if($image_tmp->isValid()):
                    //Get Original Image Name
                    $image_name = $image_tmp->getClientOriginalName();
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate new image name
                    $imageName = $image_name.'-'.rand(111, 99999).'.'.$extension;
                    //Set path for small, medium, large image
                    $large_image_path = public_path('images/coupons/').$imageName;
                    Image::make($image_tmp)->save($large_image_path);
                    //Save image in db
                    $coupon->banner = $imageName; 
            endif;
        endif;

        $coupon->title              = $request->title;
        $coupon->type               = $request->type;
        $coupon->status             = $request->status;
        $coupon->code               = $request->code;
        $coupon->start_date         = $request->start_date;
        $coupon->end_date           = $request->end_date;
        $coupon->discount_type      = $request->discount_type;
        $coupon->discount           = $request->discount;
        $coupon->product_id         = $request->product_id == '' ? null : $request->product_id;
        $coupon->minimum_shopping   = $request->minimum_shopping == '' ? 1 : $request->minimum_shopping;
        $coupon->maximum_discount   = $request->maximum_discount == '' ? null : $request->maximum_discount;
        $coupon->save();
        $notification = array(
                'message' => 'Kuponi u azhornua me sukses!',
                'alert-type' => 'success'
            );
    
        return redirect()->route('coupons.index')->with($notification);
    }

    //get product by ajax
    public function productByAjax(Request $request)
    {
        $term = trim($request->q);
        if (empty($term)) {
            return response()->json([]);
        }

        $products = Product::where('name', 'like', '%' . $request->q . '%')->get();

        $formatted_products = [];

        foreach ($products as $product) {
            $formatted_products[] = ['id' => $product->id, 'text' => $product->name];
        }

        return response()->json($formatted_products);

    }

    public function delete(Request $request, $id) {
        $request->user('admin')->authorizePermission('app.coupons.destroy');
        $coupon = Coupon::where('id', $id)->first();
        $coupon->db_status = 0;
        $coupon->update();
        $notification = array(
                'message' => 'Kuponi u fshi me sukses!',
                'alert-type' => 'success'
            );
    
        return redirect()->route('coupons.index')->with($notification);
    }
}
