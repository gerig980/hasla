<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'admin_id',
        'product_id',
        'variation', //product_stocks id 
        'price',
        'tax',
        'shipping_cost',
        'quantity',
        'delivery_status',
        'shipping_type'
    ];

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productStock()
    {
        return $this->belongsTo(ProductStock::class, 'variation', 'id');
    }
}
