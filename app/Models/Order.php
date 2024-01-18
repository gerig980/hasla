<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'admin_id',
        'order_code',
        'name',
        'address',
        'city_id',
        'country_id',
        'zipcode',
        'mobile',
        'email',
        'shipping_charges',
        'coupon_code',
        'coupon_amount',
        'payment_status',
        'payment_method_id',
        'order_status_id',
        'payment_gateaway',
        'grant_total',
        'order_from',
        'pieces',
        'weight',
        'deliver_order_id'
    ];
    protected $guarded = ['id'];

    public static function orderFrom() {
        $ordersFrom['order_from'] = array('Web', 'Facebook', 'Instagram', 'Whatsapp');
        return $ordersFrom;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function orderStatus() {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }

    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class, 'coupon_code', 'code');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function orderHistory() {
        return $this->hasMany(OrderHistory::class);
    }
}
