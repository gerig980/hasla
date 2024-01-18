<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdexApiService {
    private string $baseUrl;
    private string $username;
    private string $password;
    private string $customerUsername;
    private string $customerPassword;

    public function __construct() {
        $this->baseUrl = env('ADEX_API_BASE_URL');
        $this->username = env('ADEX_API_USERNAME');
        $this->password = env('ADEX_API_PASSWORD');
        $this->customerUsername = env('ADEX_API_CUSTOMER_USERNAME');
        $this->customerPassword = env('ADEX_API_CUSTOMER_PASSWORD');
    }

    public function login() {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->baseUrl($this->baseUrl)
            ->post('/post/login', [
                'username' => $this->customerUsername,
                'password' => $this->customerPassword,
            ]);

        $sessionToken = $response->json('data.sessionToken');
        session(['adex-session-token' => $sessionToken]);

        return $sessionToken;
    }

    public function createOrder($receiverData, $otherData) {
        $preparedData = [
            'receiver' => [
                ...$receiverData,
                "contactPhone" => "",
                "contactEmail" => "",
                'acceptEmail' => false,
                'isRegistered' => true
            ],
            'orderType' => 1,
            'serviceType' => 3,
            'packageValueCurrencyId' => 1,
            'packageType' => 'PACKET',
            'isCustomerReceiver' => false,
            'baseOrderType' => 1,
            ...$otherData
        ];

        Log::info('Calling create order route for ADEX.');
        $response = Http::baseUrl($this->baseUrl)
            ->withHeaders([
                'Session-Token' => session('adex-session-token')
            ])
            ->withBasicAuth($this->username, $this->password)
            ->post('/post/customerOrder', $preparedData);
        return $response->json('data');
    }
}
