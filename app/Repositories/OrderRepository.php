<?php

namespace App\Repositories;

use App\Models\OrderHistory;
use App\Models\PostDelivery;
use App\Services\AdexApiService;

class OrderRepository {

    private AdexApiService $adexApiService;

    public function __construct(AdexApiService $adexApiService) {
        $this->adexApiService = $adexApiService;
    }

    public function deliverOrder(OrderHistory $orderHistory) {

        if (!session('adex-session-token')) {
            $this->adexApiService->login();
        }

        if ($orderHistory->postDelivery->key === PostDelivery::POST_DELIVERY_ADEX) {
            $order = $orderHistory->order;
            $orderId = $this->adexApiService->createOrder([
                'name' => $order->name,
                'address' => $order->address,
                'stateId' => $order->country_id,
                'cityId' => $order->city_id,
                'cityName' => $order->city->name,
                'cityAreaId' => 1,
                'zipCode' => $order->zipcode,
                'contactPerson' => $order->name,
                'contactMobile' => $order->mobile,
            ], [
                'weight' => $order->weight,
                'pieces' => $order->pieces,
                'packageValue' => $order->grant_total,
            ]);

            return $orderId ?? false;
        }
    }
}
