<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethod_dumb_data = [
            [
                'admin_id' => 1,
                'name' => 'Pagesa në dorëzim',
                'icon' => 'cash-on-delivery.png',
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'admin_id' => 1,
                'name' => 'Paypal',
                'icon' => 'paypal.png',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'admin_id' => 1,
                'name' => 'In-store pickup',
                'icon' => 'location.png',
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        foreach ($paymentMethod_dumb_data as $item) {
            PaymentMethod::create($item);
        }
    }
}