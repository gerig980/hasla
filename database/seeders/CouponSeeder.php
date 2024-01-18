<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupons = [
            [
                'product_id'       => ["7","10","12","6"],
                'title'           => 'Coupon Test',
                'type'          => 'product_base',
                'code'          => 'Test12312312Code',
                'discount'         => 800,
                'discount_type'       => 'flat',
                'start_date'    => '2022-10-31 15:41:00',
                'end_date'    => '2022-11-04 23:59:00',
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
