<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSaleProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'flash_sale_id',
        'product_id',
        'variant_id',
        'status',
        'discount',
        'discount_type'
    ];

    protected $guarded = ['id'];

    public function flashSale()
    {
        return $this->belongsTo(FlashSale::class, 'flash_sale_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}