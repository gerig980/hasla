<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.flash-sale.index');
        $flashSales = FlashSale::get();

        return view('backend.product.flash-sales.index', compact('flashSales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $products = Product::lazy();
        $request->user('admin')->authorizePermission('app.flash-sale.create');
        return view('backend.product.flash-sales.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.flash-sale.create');
        $validator = Validator::make($request->all(), [
            'title'             => 'required|min:2|max:100',
            'slug'              => 'nullable|max:60|unique:flash_sales,slug,',
            'date'              => 'required',
            'background_color'  => 'nullable|regex:/(#)/',
            'text_color'        => 'nullable|regex:/(#)/',
            'product_id'        => 'required',
        ]);

      
       
        if($validator->fails()) {
           session()->flash('message', 'Flash Sale nuk mund të shtohet: ' . $validator->messages()->first());
           session()->flash('class', 'danger');
           return redirect()->back();
        }

        $flashSale = new FlashSale();
        $flashSale->title              = $request->title;
        $flashSale->slug               = strtolower(str_replace(' ', '-', $request->title).'-'.Str::random(5));
        $flashSale->background_color   = $request->background_color;
        $flashSale->text_color         = $request->text_color;

        $dates = explode(" - ", $request->date);

        $flashSale->start_date         = Carbon::createFromFormat('m-d-Y g:ia', $dates[0]);
        $flashSale->end_date           = Carbon::createFromFormat('m-d-Y g:ia', $dates[1]);
        
        // images for banner and thumbnail
        if ($request->hasFile('banner')) {
            $image_tmp = $request->file('banner');
            if ($image_tmp->isValid()) {
                $file = $request->file('banner')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $imageName = $filename . '-' . time() . '.' . $request->file('banner')->getClientOriginalExtension();
                $request->file('banner')->move(public_path('images/flash-sales/original/'), $imageName);
                $flashSale->banner = $imageName;
            }
        }

        if ($request->hasFile('thumbnail')) {
            $image_tmp = $request->file('thumbnail');
            if ($image_tmp->isValid()) {
                $file = $request->file('thumbnail')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $imageName = $filename . '-' . time() . '.' . $request->file('banner')->getClientOriginalExtension();
                $request->file('thumbnail')->move(public_path('images/flash-sales/thumbnail/'), $imageName);
                $flashSale->thumbnail = $imageName;
            }
        }

        if(isset($request->status)):
            $flashSale->status             = 1;
        else:
            $flashSale->status             = 0;
        endif;
        if(isset($request->featured)):
            $flashSale->featured           = 1;
        else:
            $flashSale->featured           = 0;
        endif;
        if($flashSale->save()){
            foreach ($request->product_id as $key => $product_id) {

                if(strpos($product_id, "-") !== false){
                    $product_explode_ids = explode("-", $product_id);
                    $p_id  = (int)$product_explode_ids[0];
                    $variant_id  = (int)end($product_explode_ids);
                }else{
                    $p_id = $product_id;
                    $variant_id = 0;
                }
                $flash_sale_product              = new FlashSaleProduct;
                $flash_sale_product->flash_sale_id    = $flashSale->id;
                $flash_sale_product->product_id  = $product_id;
                $flash_sale_product->discount  = $request['discount_'.$p_id.'_'.$variant_id];
                $flash_sale_product->discount_type  = $request['discount_type_'.$p_id.'_'.$variant_id];
                $flash_sale_product->variant_id  = $request['variant_id_'.$p_id.'_'.$variant_id];
                $flash_sale_product->save();

                // $root_product                           = Product::findOrFail($product_id);
                // $root_product->special_discount         = $request['discount_'.$product_id];
                // $root_product->special_discount_type    = $request['discount_type_'.$product_id];
                // $root_product->special_discount_start   = strtotime($dates[0]);
                // $root_product->special_discount_end     = strtotime( $dates[1]);
                // $root_product->save();
            }

            $notification = array(
                'message' => 'Flash Sale për produktet e caktuara u shtua me sukses.',
                'alert-type' => 'success'
            );
            return redirect()->route('flash-sale.index');
        }
    }

    public function product_discount(Request $request){
        $product_ids = $request->product_ids;
        // $productVariants = [];
        // foreach($product_ids as $product_id) {
        //     if($product_id.contains('-')) {
        //     }
        // }
        return view('backend.product.flash-sales.flash_sale_discount', compact('product_ids'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user('admin')->authorizePermission('app.flash-sale.edit');
        $flashSale = FlashSale::where('id', $id)->first();
        $products = Product::where('status', '1')->where('product_status', 'published')->get();
        return view('backend.product.flash-sales.edit', compact('flashSale', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    // public function edit(FlashSale $flashSale)
    // {
    //     $products = Product::lazy();

    //     return view('backend.product.flash-sales.edit', compact('flashSale', 'products'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->hasFile('banner')) {
            $file = $request->file('banner')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $imageName = $filename . '-' . time() . '.' . $request->file('banner')->getClientOriginalExtension();
            $request->file('banner')->move(public_path('backend/assets/images/products/flash-sales/original/'), $imageName);
            $formFields['banner'] = $imageName;
        }
        $request->user('admin')->authorizePermission('app.flash-sale.edit');
        $validator = Validator::make($request->all(), [
            'title' =>'required'
        ]);
        if($validator->fails()) {
            session()->flash('message', 'Flash Sale nuk mund të ndryshohet: ' . $validator->messages()->first());
            session()->flash('class', 'danger');
            return redirect()->back();
        }
        $flashSale                     = FlashSale::findOrFail($request->id);
        $flashSale->title              = $request->title;
        $flashSale->slug               = strtolower(str_replace(' ', '-', $request->title).'-'.Str::random(5));
        $flashSale->start_date         = $request->start_date;
        $flashSale->end_date           = $request->end_date;
        $flashSale->banner_type        = $request->banner_type;
        $flashSale->update();

        $flashSaleId = $request->id;
        
        if($request->product_id) {
            foreach ($request->product_id as $key => $product_id) {
                if(strpos($product_id, "-") !== false){
                    $product_explode_ids = explode("-", $product_id);
                    $p_id  = (int)$product_explode_ids[0];
                    $variant_id  = (int)end($product_explode_ids);
                }else{
                    $p_id = $product_id;
                    $variant_id = 0;
                }
                $flash_sale_product              = new FlashSaleProduct;
                $flash_sale_product->flash_sale_id    = $flashSaleId;
                $flash_sale_product->product_id  = $product_id;
                $flash_sale_product->discount  = $request['discount_'.$p_id.'_'.$variant_id];
                $flash_sale_product->discount_type  = $request['discount_type_'.$p_id.'_'.$variant_id];
                $flash_sale_product->variant_id  = $request['variant_id_'.$p_id.'_'.$variant_id];
                $flash_sale_product->save();
            }
        }
        $notification = array(
            'message' => 'Shitja Flash u ndryshua me sukses!',
            'alert-type' => 'success'
        );

        return redirect('app/flash-sale')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    // public function destroy(FlashSale $flashSale)
    // {
    //     $flashSale->delete();

    //     $notification = array(
    //         'message' => 'Shitja Flash u fshi me sukses!',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }


    // Update Flash Sale Status
    public function updateFlashSaleStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            FlashSale::where('id', $data['flashSale_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'flashSale_id' => $data['flashSale_id']]);
        }
    }


    // Get Product Price on Create Product
    // public function getProductPrice($id)
    // {
    //     $products = Product::where('id', $id)->get();
    //     return json_encode($products);
    // }


    // Delete Flash Sale Product on edit
    public function deleteFlashSaleProduct($id)
    {
        
        FlashSaleProduct::where('id', $id)->delete();

        $notification = array(
            'message' => 'Shitja Flash u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        FlashSale::where('id', $id)->delete();

        $notification = array(
            'message' => 'Flash Sale u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
}