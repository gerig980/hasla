<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'order_id', 'post_delivery_id', 'order_status_id',];
    protected $guarded  = ['id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function postDelivery()
    {
        return $this->belongsTo(PostDelivery::class, 'post_delivery_id', 'id');
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }
}
