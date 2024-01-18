<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $attributes = [
        'image' => '[]'
    ];

    protected $fillable = [
        'product_id','name','sku','price','current_stock','image',
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // public function products()
    // {
    //     return $this->belongsTo(Product::class, 'product_id', 'id');
    // }
    
    public function variants()
    {
        return $this->belongsTo(Attribute::class, 'variant_ids', 'id');
    }

    public function getDiscountPercentageAttribute()
    {
        $percentage = 0;
        $special_discount = @$this->product->special_discount;
        $now = Carbon::now()->format('Y-m-d H:i:s');

        if ($special_discount > 0 && @$this->product->special_discount_start <= $now && @$this->product->special_discount_end >= $now)
        {
            $type = $this->product->special_discount_type;

            if ($type == 'flat')
            {
                $percentage = $this->price - $special_discount;
            }
            else{
                $percentage = $this->price - ($this->price*($special_discount/100));
            }
        }
        return $percentage;
    }

}
