<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'code', 'discount', 'banner', 'discount_type', 'start_date', 'end_date', 'status', 'db_status'];
    protected $casts = [
        'product_id' => 'array',
    ];
   
}
