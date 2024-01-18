<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\FlashSale;
use App\Models\SizeGuide;
use App\Models\Collection;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\SizeGuideValue;
use App\Models\FilterAttribute;
use App\Models\FlashSaleProduct;
use App\Http\Controllers\Controller;
use App\Models\FilterAttributeValue;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\FlashSaleResource;
use App\Http\Resources\ProductStockResource;
use App\Http\Resources\AttributeValueResource;
use App\Http\Resources\FilterAttributeResource;
use Illuminate\Support\Facades\DB;

class ApiProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('productStocks')->where('product_status', '=', 'published')->where('status', 1)->orderBy('id', 'desc')->get();
        return ProductResource::collection($products);
    }

    public function getFlashSale($slug)
    {
        $time_now = Carbon::now()->toDateTimeString();
        $flash_sale = FlashSale::with('flashSaleProducts')->where('slug', $slug)->where(function ($query) use ($time_now) {
            $query->where('status', 1)
                ->where('end_date', '>', $time_now);
        })->get();
        return FlashSaleResource::collection($flash_sale);
    }

    public function getAllFlashSales()
    {
        $time_now = Carbon::now()->toDateTimeString();
        $flash_sales = FlashSale::with('flashSaleProducts')->where(function ($query) use ($time_now) {
            $query->where('status', 1)
                ->where('end_date', '>', $time_now);
        })->get();

        $data = [];
        foreach($flash_sales as $key => $flash_sale)
        {
            $data[$key] = [
                'id' => $flash_sale->id,
                'slug' => $flash_sale->slug,
                'start_date' => $flash_sale->start_date,
                'end_date'   => $flash_sale->end_date,
                'date_now' => $time_now,
            ];
        }

        return response()->json([
            "data" => $data,
        ], 200);
    }

    public function getFeaturedProducts() //this function will be used for featured products, for now is only orderBy id desc, bcs of testing purpose
    {
        $featured_products = Product::with('productStocks')->where('status',1)->orderBy('id', 'desc')->lazy();
        return ProductResource::collection($featured_products);
    }

    public function getSingleProduct($slug)
    {
        $product = Product::with('productStocks')->where('slug', $slug)->where('status', 1)->get();
        return ProductResource::collection($product);
    }

    public function getFilterAttributes()
    {
        $filter_attributes = FilterAttribute::whereIn('name', ['Stili', 'Materiali'])->get();
        return FilterAttributeResource::collection($filter_attributes);
    }

    public function getAttributes()
    {
        $attributes = Attribute::where('name', 'Madhësia')->get();
        return AttributeResource::collection($attributes);
    }

    public function getColors()
    {
        $colors = Color::get();
        return ColorResource::collection($colors);
    }

    public function categoryProducts($slug)
    {
        $categoryCount = Category::where('slug', $slug)->count();

        $parentCateg_ids = Category::categoryParentIds($slug); //parent category

        if(!empty($parentCateg_ids)){
            $categoryDetails = Category::catDetails($slug);
            $categoryProducts = Product::where('status', 1)->whereIn('category_id', $parentCateg_ids)->orderBy('id', 'desc')->get();
        }else{
            if($categoryCount > 0){
                $categoryDetails = Category::catDetails($slug);
                $categoryProducts = Product::where('status', 1)->whereIn('category_id', $categoryDetails['catIds'])->orderBy('id', 'desc')->get();
            }
        }

        // tags unique
        $unique_tags = [];
        foreach($categoryProducts as $keyProducts => $categoryProduct)
        {
            if($categoryProduct->tags) {
                $tags = explode(",", $categoryProduct->tags);
                foreach($tags as $keyTag => $tag) {
                    $unique_tags[$keyTag.$keyProducts] = [
                        'name'  => $tag
                    ];
                }
            }
        }

        $tags_collection = collect($unique_tags)->unique('name')->all();

        return response()->json([
            "categoryDetails" => $categoryDetails,
            "uniqueTags"      => $tags_collection,
            "categoryProducts" =>  ProductResource::collection($categoryProducts),
        ]);
    }

    protected function responseWithSuccess($message='', $data=[], $code =200): \Illuminate\Http\JsonResponse
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

    public function details($id,Request $request): \Illuminate\Http\JsonResponse
    {
        $product = Product::with('category')->find($id);
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $stock          = $product->stock;
        $first_stock    = '';
        $images         = [];
        $image_no       = 0;
        $colors         = [];
        $sizes          = [];

        if($product->images)
        {
            foreach ($product->images as $image) {
                if ($image)
                {
                    $images[] = $image;
                    $image_no++;
                }
            }
        }

        if ($product->has_variant) {
            foreach ($stock as $key => $item) {
                if ($key == 0) {
                    $first_stock = $item;
                }

                // if ($item->image)
                // {
                //     $images[] = $item->image;
                //     $image_no++;
                // }
            }
        }

        $images[] = $product->thumbnail;

        if($product->colors)
        {
            $color = Color::whereIn('id', $product->colors)->get();
            $colors = ColorResource::collection($color);
        }



        // flash sale and discounts
        $flash_sale_discount = FlashSale::getFlashSaleDiscount($id, 0);
        $flash_sale_data = FlashSale::where(function ($query) use ($now) {
            $query->where('status', 1)
                ->where('featured', 1)
                ->where('start_date', '<', $now)
                ->where('end_date', '>', $now)
                ->orderBy('created_at', 'desc');
        })->first();

        if($flash_sale_discount != 0)
        {
            $discounted_price = $flash_sale_discount;
            $has_flashsale = 1;
            $data = $flash_sale_data;
            $start = $flash_sale_data->start_date;
            $end = $flash_sale_data->end_date;
            $slug = $flash_sale_data->slug;
            $special_discount = (($product->price - $flash_sale_discount)/$product->price)*100;
        }
        else {
            $discount = $product->special_discount;
            $discount_type = $product->special_discount_type;
            if($product->special_discount_start <= $now && $product->special_discount_end >= $now) {
                if($product->special_discount_type == 'flat') {
                    $discounted_price = (double)$product->price - (double)$discount;
                    $special_discount = (($product->price - $discounted_price)/$product->price)*100;
                } else {
                    $discounted_price = (double)$product->price - (($discount*(double)$product->price)/100);
                    $special_discount = $product->special_discount;
                }
            } else {
                $discounted_price = '';
                $special_discount = 0;
            }
            $has_flashsale = 0;
            $data = 0;
            $start = 0;
            $end = 0;
            $slug = 0;
        }
        $oldprice = '';

        // images by colors
        $product_stock = ProductStock::where('product_id', $id)->get();

        $color_by_variants = [];
        foreach($product_stock as $keyStock => $variant)
        {
            if(strpos($variant->variant_ids, "-") !== false){
                $colorSize = explode("-", $variant->variant_ids);
                $color_id = $colorSize[0];
            }else{
                $color_id = $variant->variant_ids;
            }
            $colorValue = Color::where('id', $color_id)->first();

            $color_by_variants[$keyStock] = [
                'color_id'      => $colorValue->id,
                'color_name'    => $colorValue->name,
                'color_code'    => $colorValue->code,
                'color_images'  => json_decode($variant->image),
            ];

        }


        if($product->selected_variants_ids)
        {
            $size = AttributeValue::whereIn('id', $product->selected_variants_ids)->get();
            $sizes = AttributeValueResource::collection($size);
        }

        $sizeGuide = SizeGuide::where('id', $product->size_guide_id)->first();
        if($sizeGuide) {
            $guideValues = [];
            $sizeGuideValues = SizeGuideValue::where('size_guide_id', $sizeGuide->id)->get();
            foreach($sizeGuideValues as $guidekey => $guideValue) {
                $guideValues[$guidekey] = [
                    'guide_id'              => $sizeGuide->id,
                    'size'                  => $guideValue->size,
                    'country_size_value'    => $guideValue->country_size_value,
                    'shoulder'              => $guideValue->shoulder,
                    'length_tops'           => $guideValue->length_tops,
                    'sleeve_length'         => $guideValue->sleeve_length,
                    'bust'                  => $guideValue->bust,
                    'length_bottoms'        => $guideValue->length_bottoms,
                    'waist_size'            => $guideValue->waist_size,
                    'hip_size'              => $guideValue->hip_size,
                    'thigh'                 => $guideValue->thigh,
                    'crown'                 => $guideValue->crown,
                    'shoes_inner_length'    => $guideValue->shoes_inner_length,
                    'platform_length'       => $guideValue->bustplatform_length,
                ];
            }

        } else {
            $guideValues = '';
        }

        $name = $product->name;

        $filter_attribute_ids = array_map('intval', explode(",", $product->filter_attribute_id));
        $description_values = [];
        foreach($filter_attribute_ids as $keyAttribute => $filter_attribute)
        {
            $attribute = FilterAttributeValue::where('id', $filter_attribute)->get();
            foreach($attribute as $key => $AttributeValue){
                $filterValues = FilterAttribute::where('id', $AttributeValue->filter_attribute_id)->first();
                $description_values[$keyAttribute] = [
                    'attribute_name'        => $filterValues->name,
                    'attribute_value'       => $AttributeValue->value
                ];
            }

        }

        $up_sell_product_ids = array_map('intval', explode(",", $product->up_sell_product_ids));

        // collections of products
        $collection_array = [];
        $collections = Collection::where('status', '=', 'published')->get();

        foreach($collections as $key => $collection) {
            $productsarray = [];
            foreach(explode(",", $collection->products) as $keyProducts => $collectionProduct) {
                array_push($productsarray, (int)$collectionProduct);
            }
            if(in_array($id, $productsarray)) {
                array_push($collection_array, $collection);
            }
        }

        if($up_sell_product_ids != []) {
            $up_sell_products = ProductResource::collection(Product::whereIn('id', $up_sell_product_ids)->get());
        } else {
            $up_sell_products = ProductResource::collection(Product::where('category_id', $product->category_id)->orWhere('category_id', $product->category->parent_id)->get());
        }


        $data = [
            'name'                      => $name,
            'special_discount_type'     => $product->special_discount_type,
            'sku'                       => $product->sku,
            // 'discount'                  => $discount,
            'special_discount'          => $special_discount,
            'has_flashsale'             => $has_flashsale,
            'discounted_price'          => (double)$discounted_price,
            'price'                     => (double)$product->price,
            'current_stock'             => (int)$product->current_stock,
            'minimum_order_quantity'    => (int)$product->minimum_order_quantity,
            'total_images'              => count($images),
            'images'                    => array_reverse($images),
            'thumbnail'                 => trim($product->thumbnail, '"'),
            'colors'                    => $colors,
            'sizes'                     => $sizes,
            'attributes'                => $product->selected_variants,
            'description'               => html_entity_decode($product->description),
            'has_variant'               => (bool)$product->has_variant == 1,
            'stock_visibility'          => $product->stock_visibility != 'visible_with_quantity' ? $product->stock_visibility == 'visible_with_text' : '',
            'category_name'             => $product->category->name,
            'category_slug'             => $product->category->slug,
            'form'                      => [
                'product_id'        => $product->id,
                'quantity'          => $product->minimum_order_quantity ?: 1,
            ],
            'image_path'                => '../images/admin_products/medium/',
            'small_path'                => '../images/admin_variant_images/',
            'product_stock'             => $color_by_variants,
            'size_guide'                => $guideValues,
            'filter_attribute_id'       => $description_values,
            'collections'               => $collection_array,
            'up_selling_products'       => $up_sell_products,
            'flash_sale_discount'       => $flash_sale_discount
        ];

        return response()->json([
            "data" => $data,
        ], 200);

    }

    public function checkProductStock(Request $request): \Illuminate\Http\JsonResponse|string
    {
        try {

            $now = Carbon::now()->format('Y-m-d H:i:s');
            $product_id = $request->get('product_id');
            $product = Product::where('id', $product_id)->first(['id','has_variant','price','current_stock','colors','attribute_sets', 'special_discount_type', 'special_discount', 'special_discount_start', 'special_discount_end']);
            if (empty($product)) {
                return response()->json([
                    "data" => 'Product data not found!'
                ], 204);
            }

            if ($product->has_variant == 1) {
                $color_id = $request->get('color_id');
                $size_id = $request->get('size_id');
                if (!empty($product->colors) && !empty($product->attribute_sets)) {
                    $variant_ids = $color_id.'-'.$size_id;
                } else if (!empty($product->colors)) {
                    $variant_ids = $color_id;
                } else {
                    $variant_ids = $size_id;
                }
                $product_stock = ProductStock::where(['product_id' => $product_id, 'variant_ids' => $variant_ids])->first(['id','variant_ids','current_stock','price', 'sku']);
                $flash_sale_discount = FlashSale::getFlashSaleDiscount($product_id, $product_stock->id);
                $flash_sale_data = FlashSale::where(function ($query) use ($now) {
                    $query->where('status', 1)
                        ->where('featured', 1)
                        ->where('start_date', '<', $now)
                        ->where('end_date', '>', $now)
                        ->orderBy('created_at', 'desc');
                })->first();
                $stock_sku = $product_stock->sku;
                $discount = $product->special_discount;
                if($product->special_discount_start <= $now && $product->special_discount_end >= $now) {
                    if($product->special_discount_type == 'flat') {
                        $variant_price = ((double)$product_stock->price - (double)$discount);
                        $percentage = (($product_stock->price - $variant_price)/$product_stock->price)*100;
                    } else {
                        $variant_price = ((double)$product_stock->price - (($discount*(double)$product_stock->price)/100));
                        $percentage = $discount;
                    }
                } else {
                    $oldprice = '';
                    $discount = '';
                    $variant_price = $product_stock->price;
                    $percentage = '';
                }
                $variant_id = $product_stock->variant_ids;
                $stock = $product_stock->current_stock;

                if($flash_sale_discount != 0)
                {
                    $price = $flash_sale_discount;
                    $has_flashsale = 1;
                    $data = $flash_sale_data;
                    $start = $flash_sale_data->start_date;
                    $end = $flash_sale_data->end_date;
                    $slug = $flash_sale_data->slug;
                    $percentage_sale = (($product_stock->price - $flash_sale_discount)/$product_stock->price)*100;
                    $oldprice = $product_stock->price;

                }
                else
                {
                    $price = $variant_price;
                    $has_flashsale = 0;
                    $data = 0;
                    $start = 0;
                    $end = 0;
                    $slug = 0;
                    $percentage_sale = $percentage;
                    $oldprice = '';
                }


            }
            //  else {
            //     $product_stock = ProductStock::where(['product_id' => $product_id])->first(['id','variant_ids','current_stock','price', 'sku']);
            //     $flash_sale_discount = FlashSale::getFlashSaleDiscount($product_id, $product_stock->id);
            //     $flash_sale_data = FlashSale::where(function ($query) use ($now) {
            //     $query->where('status', 1)
            //           ->where('featured', 1)
            //           ->where('start_date', '<', $now)
            //           ->where('end_date', '>', $now)
            //           ->orderBy('created_at', 'desc');
            //     })->first();
            //     $variant_id = $product_stock->variant_ids;
            //     $stock = $product_stock->current_stock;
            //     if($flash_sale_discount != 0)
            //     {
            //         $price = $flash_sale_discount;
            //         $has_flashsale = 1;
            //         $data = $flash_sale_data;
            //         $start = $flash_sale_data->start_date;
            //         $end = $flash_sale_data->end_date;
            //         $slug = $flash_sale_data->slug;
            //     }
            //     else
            //     {
            //         $price = $product_stock->price;
            //         $has_flashsale = 0;
            //         $data = 0;
            //         $start = 0;
            //         $end = 0;
            //         $slug = 0;
            //     }
            //     $oldprice = '';
            // }

            //$f_dis = FlashSale::getFlashSaleDiscount($product_id, $product_stock->id);
            $time_now = Carbon::now()->toDateTimeString();
            return response()->json([
                "discount"              => $discount,
                "variant"               => $variant_id,
                "stock"                 => $stock,
                "price"                 => $price,
                "old_price"             => $oldprice,
                "has_flashsale"         => $has_flashsale,
                "flashsale_startdate"   => $time_now,
                "flashsale_enddate"     => $end,
                "flashsale_url"         => $slug,
                "percentage"            => $percentage_sale,
                "sku"                   => $stock_sku
            ], 200);

        } catch (\Exception $e) {
            //dd($e->getFile(), $e->getLine(), $e->getMessage());
        }
    }

    public function checkAvailableColorSize(Request $request): \Illuminate\Http\JsonResponse
    {
        $product_id = $request->get('product_id');
        $product = Product::where('id', $product_id)->first(['id', 'has_variant']);

        $sizes = [];
        if ($product->has_variant == 1) {
            $color_id = $request->get('color_id').'-';
            $product_stocks = DB::table('product_stocks')
                ->whereRaw("product_id = $product_id AND variant_ids REGEXP '{$color_id}'")
                ->get(['id','variant_ids']);

            foreach ($product_stocks as $product_stock) {
                $variant_ids = explode('-', $product_stock->variant_ids);
                array_push($sizes, (int)$variant_ids[1]);
            }
        }

        return $this->responseWithSuccess('Size check', $sizes);
    }

    public function getDescription($id)
    {
        try {
            $product = Product::get($id);

            $data = [
                'description' => $product->description
            ];

            return view('api.product-description',$data);
        } catch (\Exception $e) {
            return $this->responseWithError(__('Something Went Wrong'), [], null);
        }
    }
}
