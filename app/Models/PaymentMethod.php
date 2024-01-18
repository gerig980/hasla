<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'name', 'client_id', 'client_secret', 'sandbox_mode'];
    protected $guarded  = ['id'];
}
