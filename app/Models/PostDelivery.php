<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDelivery extends Model {
    use HasFactory;

    const POST_DELIVERY_ADEX = 'adex';

    protected $fillable = ['admin_id', 'name'];
    protected $guarded = ['id'];

}
