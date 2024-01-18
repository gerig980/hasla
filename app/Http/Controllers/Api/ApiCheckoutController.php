<?php

namespace App\Http\Controllers\Api;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Models\City;
use App\Models\Country;

class ApiCheckoutController extends Controller
{
    public function getPaymentMethods()
    {
        $payment_methods = PaymentMethod::where('status', 1)->get();
        
        $data = [];
        foreach($payment_methods as $key => $payment_method)
        {
            $data[$key] = [
                'id'    => $payment_method->id,
                'name'  => $payment_method->name,
                'icon'  => $payment_method->icon
            ];
        }

        return response()->json([
            'data' => $data,
        ],200);
    }

    public function getCoupon($code)
    {
        $coupon = Coupon::where('code', $code)->get();
        return CouponResource::collection($coupon);
    }

    public function getCountries()
    {
        $countries = Country::get();
        $data = [];
        foreach($countries as $key => $country)
        {
            $data[$key] = [
                'id' => $country->id,
                'name' => $country->name
            ];
        }
        return response()->json([
            'data' => $data
        ], 200);
    }

    public function getCities($country_id)
    {
        $cities = City::where('country_id', $country_id)->where('status', 1)->get();
        $data = [];
        foreach($cities as $key => $city)
        {
            $data[$key] = [
                'id' => $city->id,
                'country_id' => $city->country_id,
                'cost' => $city->cost,
                'name' => $city->name
            ];
        }
        return response()->json([
            'data' => $data
        ] ,200);
    }
}