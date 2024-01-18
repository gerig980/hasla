<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'user_id', 'country_id', 'city_id', 'address', 'other_phone'];
    protected $guarded  = ['id'];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
