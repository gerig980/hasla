<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $casts = [
        'attribute_sets'    => 'array',
        'images'            => 'array',
        'colors'            => 'array',
        'selected_variants' => 'array',
        'selected_variants_ids' => 'array'
    ];
    
    protected $attributes = [
        'attribute_sets'    => '[]',
        'images'            => '[]',
        'colors'            => '[]',
        'selected_variants' => '[]',
        'selected_variants_ids' => '[]'
    ];

    protected $fillable = [
        'added_by',
        'user_id',
        'category_id',
        'filter_attribute_id',
        'size_guide_id',
        'collection_id',
        'name',
        'slug',
        'sku',
        'images',
        'image_ids',
        'thumbnail',
        'thumbnail_id',
        'video_provider',
        'video_url',
        'colors',
        'attribute_sets',
        'has_variant',
        'selected_variants',
        'selected_variants_ids',
        'description',
        'price',
        'current_stock',
        'minimum_order_quantity',
        'stock_notification',
        'low_stock_to_notify',
        'stock_visibility',
        'total_sale',
        'special_discount',
        'special_discount_type',
        'special_discount_start',
        'special_discount_end',
        'status',
        'is_featured',
        'is_refundable',
        'todays_deal',
        'rating',
        'product_status',
        'allow_checkout_when_out_of_stock',
        'with_storehouse_management',
        'free_shipping',
        'length',
        'wide',
        'height',
        'weight',
        'barcode',
        'tax_id',
        'vat_taxes',
        'num_of_sale',
        'viewed',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $dates = [
        'special_discount_start',
        'special_discount_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function filterAttribute()
    {
        return $this->belongsTo(FilterAttribute::class, 'filter_attribute_id', 'id');
    }

    public function sizeGuide()
    {
        return $this->belongsTo(SizeGuide::class, 'size_guide_id', 'id');
    }

    public static function discountType()
    {
        $discountType['discount_type'] = array('flat', 'percent');
        return $discountType;
    }

    public static function productStatus()
    {
        $productStatus['product_status'] = array('published', 'draft');
        return $productStatus;
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public static function getVariants($variants_data = array())
    {
        $all_variants = array(array());
        foreach ($variants_data as $key => $value) {
            $values = array();
            foreach ($all_variants as $variant) {
                foreach ($value as $property_value) {
                    $values[] = array_merge($variant, array($key => $property_value));
                }
            }
            $all_variants = $values;
        }
        return $all_variants;
    }

    public function productStocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function stock()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vatTaxes($product)
    {
        return Tax::find(explode(',',$product->vat_taxes));
    }

    public function flashSale()
    {
        return $this->hasOne(FlashSaleProduct::class);
    }

    public function getSpecialDiscountCheckAttribute()
    {
        $price = 0;
        $special_discount = $this->special_discount;
        $now = Carbon::now()->format('Y-m-d H:i:s');

        if ($special_discount > 0 && $this->special_discount_start <= $now && $this->special_discount_end >= $now)
        {
            $price = $special_discount;
        }

        return round($price,2);
    }

    public function getDiscountPercentageAttribute()
    {
        $amount = 0;
        $special_discount = $this->special_discount;
        $now = Carbon::now()->format('Y-m-d H:i:s');

        if ($special_discount > 0 && $this->special_discount_start <= $now && $this->special_discount_end >= $now)
        {
            $type = $this->special_discount_type;

            if ($type == 'flat')
            {
                $amount = $this->price - $special_discount;
            }
            else{
                $amount = $this->price - ($this->price*($special_discount/100));
            }
        }
        return round($amount,2);
    }

    public static function getDiscountPrice($id)
    {
        $amount = 0;
        $product = Product::find($id);
        $special_discount = $product->special_discount;
        $now = Carbon::now()->format('Y-m-d H:i:s');

        if ($special_discount > 0 && $product->special_discount_start <= $now && $product->special_discount_end >= $now)
        {
            $type = $product->special_discount_type;

            if ($type == 'flat')
            {
                $amount = $product->price - $special_discount;
            }
            else{
                $amount = $product->price - ($product->price*($special_discount/100));
            }
        }
        return round($amount,2);
    }

}