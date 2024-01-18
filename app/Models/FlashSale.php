<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'background_color',
        'text_color',
        'banner',
        'thumbnail',
        'start_date',
        'end_date',
        'status',
        'featured',
        'flash_sale'
    ];

    protected $guarded = ['id'];

    public function flashSaleProducts()
    {
        return $this->hasMany(FlashSaleProduct::class);
    }

    public function getFlashSaleStartDateAttribute(): string
    {
        return $this->start_date ? Carbon::parse($this->start_date)->format('d M Y') : '';
    }
    public function getFlashSaleEndDateAttribute(): string
    {
        return $this->end_date && $this->end_date >= now() ? Carbon::parse($this->end_date)->format('d M Y') : '';
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'flash_sale_products');
    }

    public static function getFlashSaleDiscount($productId, $variantId)
    {
        $amount = 0;
        $time_now = Carbon::now()->format('Y-m-d H:i:s');

        $flash_sale = FlashSale::where(function ($query) use ($time_now) {
            $query->where('status', 1)
                  ->where('featured', 1)
                  ->where('start_date', '<', $time_now)
                  ->where('end_date', '>', $time_now)
                  ->orderBy('created_at', 'desc');
            })->first();
        
        if(!empty($flash_sale))
        {
            $flash_sale_product = FlashSaleProduct::where(function ($q) use ($productId, $variantId, $flash_sale) {
                    $q->where('flash_sale_id', $flash_sale->id)
                      ->where('product_id', $productId)
                      ->where('variant_id', $variantId);
                })->first();
        }

        if(!empty($flash_sale) && !empty($flash_sale_product))
        {
            if($variantId != 0)
            {
                $product_stock = ProductStock::where('id', $variantId)->first();
                if($flash_sale_product->discount_type == 'flat')
                {
                    $amount = $product_stock->price - $flash_sale_product->discount;
                }
                else
                {
                    $amount = $product_stock->price - ($product_stock->price*($flash_sale_product->discount/100));
                }
            }
            else
            {
                $product = Product::where('id', $productId)->first();
                if($flash_sale_product->discount_type == 'flat')
                {
                    $amount = $product->price - $flash_sale_product->discount;
                }
                else
                {
                    $amount = $product->price - ($product->price*($flash_sale_product->discount/100));
                }
            }
        }
        else
        {
            $amount = 0;
        }


        return round($amount,2);
    }


}
