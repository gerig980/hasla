<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\FilterAttribute;
use App\Models\SizeGuide;
use App\Models\Color;
use App\Models\Attribute;
use App\Models\ProductStock;
use App\Models\AttributeValue;
use App\Models\Collection;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Exports\ExportProduct;
use App\Exports\ExportProductSample;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
//use Image;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.product.index');
        $products = Product::where('status', 1)->orderBy('created_at', 'desc')->lazy();
        $categories = Category::tree();
        return view('backend.product.products.index', compact('products', 'categories'));
    }

    public function create(Request $request)
    {
        $request->user('admin')->authorizePermission('app.product.create');
        $discountType = Product::discountType();
        $discount_types = $discountType['discount_type'];
        $productStatus = Product::productStatus();
        $product_status = $productStatus['product_status'];
        $filter_attributes = FilterAttribute::get();
        $size_guides = SizeGuide::get();
        $products = Product::lazy();
        $colors = Color::get();
        $attributes = Attribute::where('id',1)->get();
        $collections = Collection::get();
        $attribute_sets = AttributeValue::get();
        return view('backend.product.products.create', ['categories' => Category::tree()],
            compact('attributes', 'attribute_sets', 'colors', 'discount_types', 'product_status', 'filter_attributes', 'size_guides', 'products', 'collections'));
    }

    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.product.create');
        if ($request->variant_ids && count($request->variant_ids))
        {
            session()->put('attributes',count($request->variant_ids));
        }

        $validator = Validator::make($request->all(), [
            'name'                      => 'required|max:190',
            'slug'                      => 'unique:products,slug|string|max:300',
            'category'                  => 'required',
            'price'                     => 'numeric|required',
            'unit'                      => 'required',
            'video_url'                 => 'required_with:video_provider',
            'minimum_order_quantity'    => 'numeric|min:1',
            'low_stock_to_notify'       => 'numeric|min:0',
        ]);

        if($validator->fails()) {
            session()->flash('message', 'Produkti nuk mund të shtohet: ' . $validator->messages()->first());
            session()->flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        if($request->hasFile('thumbnail')):
            $image_tmp = $request->file('thumbnail');
            if($image_tmp->isValid()):
                //Get Original Image Name
                $image_extension = $image_tmp->getClientOriginalName();
                $image_name = pathinfo($image_extension, PATHINFO_FILENAME);
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = $image_name.'-'.rand(111, 99999).'.'.$extension;
                //Set path for small, medium, large image
                $large_image_path = public_path('images/admin_products/large/').$imageName;
                $medium_image_path = public_path('images/admin_products/medium/').$imageName;
                $small_image_path = public_path('images/admin_products/small/').$imageName;
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(760, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($medium_image_path);
                Image::make($image_tmp)->resize(270, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($small_image_path);
                //Save image in db
                $product->thumbnail = $imageName;
            endif;
        else:
            $product->thumbnail = "";
        endif;


        if($request->hasfile('images'))
        {
            $images = array();
            foreach($request->images as $key => $image)
            {
                if($image->isValid())
                {
                    //Get Original Image Name
                    $img_extension = $image->getClientOriginalName();
                    $img_name = pathinfo($img_extension, PATHINFO_FILENAME);
                    //Get Image Extension
                    $extension = $image->getClientOriginalExtension();
                    //Generate new image name
                    $filename = $img_name.'-'.rand(111, 99999).'.'.$extension;
                    //Set path for small, medium, large image
                    $destinationLargePath =public_path('images/product_gallery/').$filename;
                    Image::make($image)->resize(760, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationLargePath);
                    //$image->move($destinationPath, $filename);
                    array_push($images, $filename);
                }
            }
            $product->images = $images;
        }

        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name));
        $last_product_id = Product::orderBy('id', 'DESC')->first();
        $slug_combination = $slug.'-'.$last_product_id->id + 1;

        $product->slug              = $slug_combination;
        $product->category_id       = $request->category != '' ? $request->category : null;
        $product->status            = $request->status;
        $product->minimum_order_quantity    = $request->minimum_order_quantity != '' ? $request->minimum_order_quantity : 1;
        $product->barcode                   = $request->barcode;

        if ($request->video_provider != '' && $request->video_url != ''):
            $product->video_provider    = $request->video_provider;
            $product->video_url         = $request->video_url;
        endif;

        $product->price = $request->price;

        if ($request->special_discount_type != ''):
            $product->special_discount_type     = $request->special_discount_type;
            $product->special_discount          = $request->special_discount;
            $product->special_discount_start    = $request->special_discount_start;
            $product->special_discount_end      = $request->special_discount_end;
        endif;

        if ($request->has_variant == 1):
            $product->has_variant   = 1;
            $product->current_stock = 0;
        else:
            $product->current_stock = $request->current_stock != '' ? $request->current_stock : 0;
        endif;

        $product->colors            = $request->colors ?? [];
        $product->attribute_sets    = $request->attribute_sets ?? [];
        $product->status = 1;
        $product->unit = $request->unit;
        $product->sku = $request->sku ?? null;
        $product->description = $request->input("description") ?? null;
        $product->length = $request->input("length") ?? null;
        $product->wide = $request->input("wide") ?? null;
        $product->weight = $request->input("weight") ?? null;
        $product->height = $request->input("height") ?? null;
        $product->meta_title = $request->input("meta_title") ?? null;
        $product->meta_description = $request->input("meta_description") ?? null;
        $product->meta_keywords = $request->input("meta_keywords") ?? null;

        if ($request->has('vat_taxes')):
            $product->vat_taxes     = implode(',', $request->vat_taxes);
        endif;

        if ($request->low_stock_to_notify != ''):
            $product->stock_notification    = 1;
            $product->low_stock_to_notify   = $request->low_stock_to_notify;
        endif;

        $product->stock_visibility          = $request->stock_visibility;


        if ($request->has('is_refundable')):
            $product->is_refundable         = 1;
        endif;

        if ($request->has('is_featured')):
            $product->is_featured           = 1;
        endif;

        if ($request->has('todays_deal')):
            $product->todays_deal = $request->todays_deal;
        endif;

        if ($request->has('tags')):
            $product->tags = implode(',', $request->tags);
        endif;

        if ($request->has('filter_attribute_id')):
            $product->filter_attribute_id = implode(',', $request->filter_attribute_id);
        endif;

        if ($request->has('up_sell_product_ids')):
            $product->up_sell_product_ids = implode(',', $request->up_sell_product_ids);
        endif;

        if ($request->has('size_guide_id')):
            $product->size_guide_id = $request->size_guide_id ?? 0; //else 0, just for testing purpose
        endif;
        if ($request->has('collection_id')):
            $product->collection_id = implode(',', $request->collection_id);
        endif;
        $product->save();

        if ($product->has_variant == 1 && $request->has('variant_name')):
            $total_stock = 0;
            foreach ($request->variant_name as $key => $variant):
                if ($request['variant_name'][$key]):
                    $product_stock = new ProductStock();
                    $product_stock->product_id      = $product->id;
                    $product_stock->name            = $request['variant_name'][$key];
                    $product_stock->variant_ids     = $request['variant_ids'][$key];
                    $product_stock->sku             = $request['variant_sku'][$key];
                    $product_stock->current_stock   = $request['variant_stock'][$key];
                    $product_stock->price           = $request['variant_price'][$key];

                    if (isset($request['variant_image'][$request['variant_ids'][$key]]))
                    {
                        $images = array();
                        foreach($request['variant_image'][$request['variant_ids'][$key]] as $image)
                        {
                            if($image->isValid())
                            {
                                //Get Original Image Name
                                $img_extension = $image->getClientOriginalName();
                                $img_name = pathinfo($img_extension, PATHINFO_FILENAME);
                                //Get Image Extension
                                $extension = $image->getClientOriginalExtension();
                                //Generate new image name
                                $filename = $img_name.'-'.rand(111, 99999).'.'.$extension;
                                //Set path for small, medium, large image
                                $destinationLargePath =public_path('images/admin_variant_images/').$filename;

                                Image::make($image)->resize(760, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save($destinationLargePath);
                                //$image->move($destinationPath, $filename);
                                array_push($images, $filename);
                            }
                        }
                        $product_stock->image = json_encode($images);
                    }

                    $total_stock += $product_stock->current_stock;
                    $product_stock->save();
                endif;

                $selected_variants = array();
                $selected_variants_ids = array();

                if ($request->has('attribute_sets')):
                    foreach ($request->attribute_sets as $attribute_set):
                        $attribute_values = 'attribute_values_' . $attribute_set;
                        $values = array();
                        if ($request->has($attribute_values)):
                            foreach ($request[$attribute_values] as $value):
                                array_push($values, $value);
                                array_push($selected_variants_ids, $value);
                            endforeach;
                            $selected_variants[$attribute_set] = $values;
                        endif;
                    endforeach;
                endif;
                $product->selected_variants     = $selected_variants;
                $product->selected_variants_ids = $selected_variants_ids;
            endforeach;

            $product->current_stock         = $total_stock;
            $product->save();
        endif;

        $notification = array(
            'message' => 'Produkti është shtuar me success!',
            'alert-type' => 'success'
        );
        session()->forget('attributes');
        return redirect()->route('app.product.index')->with($notification);
    }

    public function edit(Request $request, $id)
    {
        $request->user('admin')->authorizePermission('app.product.edit');
        $discountType = Product::discountType();
        $discount_types = $discountType['discount_type'];
        $productStatus = Product::productStatus();
        $product_status = $productStatus['product_status'];
        $filter_attributes = FilterAttribute::get();
        $size_guides = SizeGuide::get();
        $products = Product::lazy();
        $colors = Color::get();
        $attributes = Attribute::get();
        $attribute_sets = AttributeValue::get();
        $collections = Collection::get();
        $product = Product::findOrFail($id);
        $product_collection= [];
        foreach($product->collections as $p_collection){
            $product_collection[] = $p_collection->name ;
        }
        return view('backend.product.products.edit', ['categories' => Category::tree()],
            compact('attributes', 'attribute_sets', 'colors', 'discount_types', 'product_status', 'filter_attributes', 'size_guides', 'products', 'product', 'collections', 'product_collection'));

    }

    public function show(Request $request, $id)
    {
        $request->user('admin')->authorizePermission('app.product.show');
        $product = Product::where('id', $id)->first();
        $orders = OrderDetail::where('product_id', $id)->count();
        $filterAttributes = FilterAttribute::get();
        return view('backend.product.products.show', compact('product', 'orders', 'filterAttributes'));
    }

    public function variants(Request $request)
    {
        if ($request->has_variant == 1):
            $variants = array();
            $product_id = $request->id;

            $product_price = $request->price;
            $colors       = false;

            if (!empty($request->colors)):
                array_push($variants, $request->colors);
                $colors = true;
            endif;

            if ($request->has('attribute_sets')):
                foreach ($request->attribute_sets as $key => $attribute_set):
                    $attribute_values = 'attribute_values_'.$attribute_set;
                    $values = array();
                    if ($request->has($attribute_values)):
                        foreach ($request[$attribute_values] as $value):
                            array_push($values, $value);
                        endforeach;
                    endif;
                    if($request->has($attribute_values)):
                        array_push($variants, $values);
                    endif;
                endforeach;
            endif;
            $variants_data = Product::getVariants($variants);
            $product = Product::where('id', $product_id)->first();

            if(!empty($product))
            {
                return view('backend.product.products.edit-variants', compact('variants','variants_data','product_price','colors', 'product_id'));
            }
            elseif (!empty($variants_data[0]))
            {
                return view('backend.product.products.variants', compact('variants','variants_data','product_price','colors', 'product_id'));
            }else{
                return view('backend.product.products.variants');
            }
        else:
            return '';
        endif;
    }

    public function getAttributeValues(Request $request)
    {
        $attributes_sets = $request->attribute_sets;

        if (!empty($attributes_sets)):
            $attributes = Attribute::whereIn('attributes.id', $attributes_sets)->get();
            return view('backend.product.products.values', compact('attributes','request','attributes_sets'));
        else:
            return '';
        endif;
    }

    public function updateProductStatus(Request $request)
    {
        $request->user('admin')->authorizePermission('app.product.edit');
        if($request->ajax())
        {
            $data = $request->all();

            if($data['status'] == "Active")
            {
                $status = 0;
            }else{
                $status = 1;
            }
            Product::where('id', $data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'product_id'=>$data['product_id']]);
        }
    }

    public function searchProduct(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $products = DB::table('products')->orWhere(DB::raw('CONCAT(name)'), 'LIKE', '%' . $request->search . '%')->orWhere(DB::raw('CONCAT(sku)'),'LIKE'. $request->search. '%')->orWhere(DB::raw('CONCAT(price)'),'LIKE','%'.$request->search. '%')->get();

            if($products)
            {
                $output = '<ul class="product-output-ul" style="display:block; position:relative">';
                foreach ($products as $key => $product) {
                    $output.='<li class="product-output" id="'.$product->id.'">'.
                        '<span><img src="/images/admin_products/small/'.str_replace( array('"'), '', $product->thumbnail).'" style="width:60px; margin-right:6px;margin-top:6px;"/>'.$product->name.'</span>'.
                        '</li>';

                }
                $output .= '</ul>';
                return Response($output);
            }
        }
    }

    public function filterProduct(Request $request){

        $from = date($request->fromDate);
        $to = date($request->toDate);
        $categories = Category::tree();
        


        $products = DB::table('products')->where('status', 1);
        if(!empty($request->search)) {
           $products->where(('name'), 'LIKE', '%' . $request->search . '%');
           
        }
            
        if(!empty($to) && !empty($from)){
            $products->whereBetween('created_at', [$from, $to]);
        }
        if(!empty($request->category)){
            $products->where('category_id', $request->category);
        }
        if(!empty($request->status)) {
            $products->where(('product_status'), 'LIKE', '%' . $request->status . '%');
        }
        $products = $products->get();

        if($products){
            return view('backend.product.products.index')->with(['products' => $products, 'categories' => $categories]);
        }
    }

    public function productById($id)
    {
        $product = Product::where('id', $id)->orderBy('id', 'asc')->get();
        return json_encode($product);
    }

    public function update(Request $request)
    {

        if ($request->variant_ids && count($request->variant_ids))
        {
            session()->put('attributes',count($request->variant_ids));
        }

        $validator = Validator::make($request->all(), [
            'name'                      => 'required|max:190',
            'slug'                      => 'unique:products,slug|string|max:300',
            'category'                  => 'required',
            'price'                     => 'numeric|required',
            'unit'                      => 'required',
            'video_url'                 => 'required_with:video_provider',
            'minimum_order_quantity'    => 'numeric|min:1',
            'low_stock_to_notify'       => 'numeric|min:0',
        ]);

        if($validator->fails()) {
            session()->flash('message', 'Produkti nuk mund të shtohet: ' . $validator->messages()->first());
            session()->flash('class', 'danger');
            return redirect()->back();
        }

        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        if($request->hasFile('thumbnail')):
            $image_tmp = $request->file('thumbnail');
            if($image_tmp->isValid()):
                //Get Original Image Name
                $image_extension = $image_tmp->getClientOriginalName();
                $image_name = pathinfo($image_extension, PATHINFO_FILENAME);
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = $image_name.'-'.rand(111, 99999).'.'.$extension;
                //Set path for small, medium, large image
                $large_image_path = public_path('images/admin_products/large/').$imageName;
                $medium_image_path = public_path('images/admin_products/medium/').$imageName;
                $small_image_path = public_path('images/admin_products/small/').$imageName;



                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($medium_image_path);
                Image::make($image_tmp)->resize(270, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($small_image_path);
                //Save image in db
                $product->thumbnail = $imageName;
            endif;
        endif;
        if($request->hasfile('images'))
        {
            $images = array();
            foreach($request->images as $key => $image)
            {
                if($image->isValid())
                {
                    //Get Original Image Name
                    $img_extension = $image->getClientOriginalName();
                    $img_name = pathinfo($img_extension, PATHINFO_FILENAME);
                    //Get Image Extension
                    $extension = $image->getClientOriginalExtension();
                    //Generate new image name
                    $filename = $img_name.'-'.rand(111, 99999).'.'.$extension;
                    //Set path for small, medium, large image
                    $destinationLargePath =public_path('images/product_gallery/').$filename;
                    Image::make($image)->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationLargePath);
                    //$image->move($destinationPath, $filename);
                    array_push($images, $filename);
                }
            }
            $product->images = $images;
        }

        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name));
        $last_product_id = Product::orderBy('id', 'DESC')->first();
        $slug_combination = $slug.'-'.$last_product_id->id + 1;

        $product->slug              = $slug_combination;
        $product->category_id       = $request->category != '' ? $request->category : null;
        $product->status            = $request->status;
        $product->minimum_order_quantity    = $request->minimum_order_quantity != '' ? $request->minimum_order_quantity : 1;
        $product->barcode                   = $request->barcode;

        if ($request->video_provider != '' && $request->video_url != ''):
            $product->video_provider    = $request->video_provider;
            $product->video_url         = $request->video_url;
        endif;

        $product->price = $request->price;

        if ($request->special_discount_type != ''):
            $product->special_discount_type     = $request->special_discount_type;
            $product->special_discount          = $request->special_discount;
            $product->special_discount_start    = $request->special_discount_start;
            $product->special_discount_end      = $request->special_discount_end;
        endif;

        if ($request->has_variant == 1):
            $product->has_variant   = 1;
            $product->current_stock = 0;
        else:
            $product->current_stock = $request->current_stock != '' ? $request->current_stock : 0;
        endif;

        $product->colors            = $request->colors ?? [];
        $product->attribute_sets    = $request->attribute_sets ?? [];
        $product->status = 1;
        $product->unit = $request->unit;
        $product->sku = $request->sku;
        $product->description = $request->input("description");
        $product->length = $request->input("length");
        $product->wide = $request->input("wide");
        $product->weight = $request->input("weight");
        $product->height = $request->input("height");
        $product->meta_title = $request->input("meta_title");
        $product->meta_description = $request->input("meta_description");
        $product->meta_keywords = $request->input("meta_keywords");

        if ($request->has('vat_taxes')):
            $product->vat_taxes     = implode(',', $request->vat_taxes);
        endif;

        if ($request->low_stock_to_notify != ''):
            $product->stock_notification    = 1;
            $product->low_stock_to_notify   = $request->low_stock_to_notify;
        endif;

        $product->stock_visibility          = $request->stock_visibility;


        if ($request->has('is_refundable')):
            $product->is_refundable         = 1;
        endif;

        if ($request->has('is_featured')):
            $product->is_featured           = 1;
        endif;

        if ($request->has('todays_deal')):
            $product->todays_deal = $request->todays_deal;
        endif;

        if ($request->has('tags')):
            $product->tags = implode(',', $request->tags);
        endif;

        if ($request->has('filter_attribute_id')):
            $product->filter_attribute_id = implode(',', $request->filter_attribute_id);
        endif;

        if ($request->has('up_sell_product_ids')):
            $product->up_sell_product_ids = implode(',', $request->up_sell_product_ids);
        endif;

        if ($request->has('size_guide_id')):
            $product->size_guide_id = $request->size_guide_id ?? 0;
        endif;
        if ($request->has('collection_id')):
            $product->collection_id = implode(',', $request->collection_id);
        endif;
        $product->update();

        if ($product->has_variant == 1 && $request->has('variant_name')):
            $total_stock = 0;

            foreach ($request->variant_name as $key => $variant):
                if ($request['variant_name'][$key]):
                    $product_stock = ProductStock::firstOrCreate(['variant_ids' => $request['variant_ids'][$key], 'product_id' => $product->id]);
                    $product_stock->product_id      = $product->id;
                    $product_stock->name            = $request['variant_name'][$key];
                    $product_stock->variant_ids     = $request['variant_ids'][$key];
                    $product_stock->sku             = $request['variant_sku'][$key];
                    $product_stock->current_stock   = $request['variant_stock'][$key];
                    $product_stock->price           = $request['variant_price'][$key];

                    if (isset($request['variant_image'][$request['variant_ids'][$key]]))
                    {
                        $images = array();
                        foreach($request['variant_image'][$request['variant_ids'][$key]] as $image)
                        {
                            if($image->isValid())
                            {
                                //Get Original Image Name
                                $img_extension = $image->getClientOriginalName();
                                $img_name = pathinfo($img_extension, PATHINFO_FILENAME);
                                //Get Image Extension
                                $extension = $image->getClientOriginalExtension();
                                //Generate new image name
                                $filename = $img_name.'-'.rand(111, 99999).'.'.$extension;
                                //Set path for small, medium, large image
                                $destinationLargePath =public_path('images/admin_variant_images/').$filename;

                                Image::make($image)->resize(600, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save($destinationLargePath);
                                //$image->move($destinationPath, $filename);
                                array_push($images, $filename);
                            }
                        }
                        $product_stock->image = json_encode($images);
                    }

                    $total_stock += $product_stock->current_stock;
                    $product_stock->save();
                endif;

                $selected_variants = array();
                $selected_variants_ids = array();

                if ($request->has('attribute_sets')):
                    foreach ($request->attribute_sets as $attribute_set):
                        $attribute_values = 'attribute_values_' . $attribute_set;
                        $values = array();
                        if ($request->has($attribute_values)):
                            foreach ($request[$attribute_values] as $value):
                                array_push($values, $value);
                                array_push($selected_variants_ids, $value);
                            endforeach;
                            $selected_variants[$attribute_set] = $values;
                        endif;
                    endforeach;
                endif;
                $product->selected_variants     = $selected_variants;
                $product->selected_variants_ids = $selected_variants_ids;
            endforeach;

            $product->current_stock = $total_stock;
            $product->save();

        endif;

        $notification = array(
            'message' => 'Produkti është shtuar me success!',
            'alert-type' => 'success'
        );
        session()->forget('attributes');
        return redirect()->route('app.product.index')->with($notification);
    }

    public function statusChange(Request $request, $id) //for user will be as 'delete product', any of products will not be deleted from DB
    {
        $request->user('admin')->authorizePermission('app.product.destroy');

        $product = Product::findOrFail($id);
        $product->update(['status' => 0]);

        $notification = array(
            'message' => 'Produkti u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function exportProducts(Request $request){
        return Excel::download(new ExportProduct, 'products.xlsx');
    }

    public function exportProductsSample(Request $request){
        return Excel::download(new ExportProductSample, 'productsSample.xlsx');
    }

    public function importProducts() 

    {
        Excel::import(new ProductImport,request()->file('file'));
              
        return back();

    }

}
