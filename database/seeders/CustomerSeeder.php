<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_dumb_data = [
            [
                'id'    => 1,
                'name'  => 'Lefter Harifi',
                'phone' => '0692552557',
                'email' => 'lefter.harifi@gmail.com',
                'created_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 2,
                'name'  => 'Arben Kola',
                'phone' => '0672335481',
                'email' => 'arben.kola@gmail.com',
                'created_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 3,
                'name'  => 'Vesa Nazifi',
                'phone' => '06842215362',
                'email' => 'vesa.nazifi@gmail.com',
                'created_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 4,
                'name'  => 'Blerta Tupi',
                'phone' => '0695228345',
                'email' => 'blerta.tupi@gmail.com',
                'created_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 5,
                'name'  => 'Drita Haxhiu',
                'phone' => '0674452222',
                'email' => 'drita.haxhiu@gmail.com',
                'created_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        $customer_addresses_dumb_data = [
            [
                'customer_id' => 1,
                'country_id'  => 1,
                'city_id'     => 1,
                'cost'        => 200,
                'address'     => 'Rr.Bill Klinton, Kodra e Diellit, Tirane, Albania'
        
            ],
            [
                'customer_id' => 1,
                'country_id'     => 1,
                'city_id'        => 2,
                'cost'        => 200,
                'address'     => 'Rr.Panorama, Tirane, Albania'
        
            ],
            [
                'customer_id' => 2,
                'country_id'     => 1,
                'city_id'        => 3,
                'cost'        => 200,
                'address'     => 'Blv. Zogu i pare, Tirane, Albania'
        
            ],
            [
                'customer_id' => 2,
                'country_id'     => 1,
                'city_id'        => 4,
                'cost'        => 200,
                'address'     => 'Rr.Tish Daija, Tirane, Albania'
        
            ],
            [
                'customer_id' => 3,
                'country_id'     => 1,
                'city_id'        => 5,
                'cost'        => 200,
                'address'     => 'Rr.Demokracia, Tirane, Albania'
        
            ],
            [
                'customer_id' => 5,
                'country_id'     => 1,
                'city_id'        => 7,
                'cost'        => 300,
                'address'     => 'Rr.Myslym Shyri, Tirane, Albania'
        
            ],
        ];
        
        foreach ($customer_dumb_data as $item) {
            Customer::create($item);
        }
        
        foreach ($customer_addresses_dumb_data as $item) {
            CustomerAddress::create($item);
        }
    }
}
