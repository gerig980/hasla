<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\FlashSale;
use App\Models\FlashSaleProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlashSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // $flash_sale_dumb_data = [

        //     [
        //         'title'      => 'Halloween sjell ulje të çmendura!',
        //         'slug'       => 'halloween-sjell-ulje-te-cmendura',
        //         'start_date' => '2022-10-25 08:56:00',
        //         'end_date'   => '2023-11-30 23:59:00',
        //         'featured'   => 1,
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'title'      => 'Ulje të çmendura per festat!',
        //         'slug'       => 'Ulje-te-çmendura-per-festat',
        //         'start_date' => '2022-10-29 08:56:00',
        //         'end_date'   => '2022-11-11 22:59:00',
        //         'featured'   => 0,
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'title'      => 'Shkolla Filloi! Nxitoni të përfitoni nga uljet në dyqanin tonë online!',
        //         'slug'       => 'shkolla-filloi-nxitoni-te-përfitoni-nga-uljet-ne-dyqanin-tone-online',
        //         'start_date' => '2022-10-29 08:56:00',
        //         'end_date'   => '2022-11-11 22:59:00',
        //         'featured'   => 0,
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        //     ]
        // ];

        // $flash_sale_products_dumb_data = [
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 1,
        //         'discount'      => 50,
        //         'variant_id'    => 1,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 2,
        //         'discount'      => 40,
        //         'variant_id'    => 5,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'     => 3,
        //         'discount'      => 80,
        //         'variant_id'    => 10,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 4,
        //         'discount'      => 10,
        //         'variant_id'    => 8,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 5,
        //         'discount'      => 25,
        //         'variant_id'    => 6,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 6,
        //         'discount'      => 30,
        //         'variant_id'    => 17,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 7,
        //         'discount'      => 20,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 8,
        //         'discount'      => 50,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 11,
        //         'discount'      => 60,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 12,
        //         'discount'      => 45,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 2,
        //         'product_id'    => 1,
        //         'discount'      => 50,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 2,
        //         'product_id'    => 4,
        //         'discount'      => 40,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 2,
        //         'product_id'    => 9,
        //         'discount'      => 80,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 2,
        //         'product_id'    => 7,
        //         'discount'      => 10,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 2,
        //         'product_id'    => 10,
        //         'discount'      => 25,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 2,
        //         'product_id'    => 12,
        //         'discount'      => 30,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 1,
        //         'product_id'    => 1,
        //         'discount'      => 50,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 3,
        //         'product_id'    => 2,
        //         'discount'      => 40,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 3,
        //         'product_id'    => 12,
        //         'discount'      => 80,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'flash_sale_id' => 3,
        //         'product_id'    => 7,
        //         'discount'      => 10,
        //         'discount_type' => 'flat',
        //         'status'        => 'pending',
        //         'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        // ];

        // foreach ($flash_sale_dumb_data as $item) {
        //     FlashSale::create($item);
        // }

        // foreach ($flash_sale_products_dumb_data as $item){
        //     FlashSaleProduct::create($item);
        // }
    //     $flash_sale_dumb_data = [

    //         [
    //             'title'      => 'Halloween sjell ulje të çmendura!',
    //             'slug'       => 'halloween-sjell-ulje-te-cmendura',
    //             'start_date' => '2022-10-25 08:56:00',
    //             'end_date'   => '2023-11-30 23:59:00',
    //             'featured'   => 1,
    //             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'title'      => 'Ulje të çmendura per festat!',
    //             'slug'       => 'Ulje-te-çmendura-per-festat',
    //             'start_date' => '2022-10-29 08:56:00',
    //             'end_date'   => '2022-11-11 22:59:00',
    //             'featured'   => 0,
    //             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'title'      => 'Shkolla Filloi! Nxitoni të përfitoni nga uljet në dyqanin tonë online!',
    //             'slug'       => 'shkolla-filloi-nxitoni-te-përfitoni-nga-uljet-ne-dyqanin-tone-online',
    //             'start_date' => '2022-10-29 08:56:00',
    //             'end_date'   => '2022-11-11 22:59:00',
    //             'featured'   => 0,
    //             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    //         ]
    //     ];

    //     $flash_sale_products_dumb_data = [
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 1,
    //             'discount'      => 50,
    //             'variant_id'    => 1,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 2,
    //             'discount'      => 40,
    //             'variant_id'    => 5,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'     => 3,
    //             'discount'      => 80,
    //             'variant_id'    => 10,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 4,
    //             'discount'      => 10,
    //             'variant_id'    => 8,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 5,
    //             'discount'      => 25,
    //             'variant_id'    => 6,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 6,
    //             'discount'      => 30,
    //             'variant_id'    => 17,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 7,
    //             'discount'      => 20,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 8,
    //             'discount'      => 50,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 11,
    //             'discount'      => 60,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 12,
    //             'discount'      => 45,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 2,
    //             'product_id'    => 1,
    //             'discount'      => 50,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 2,
    //             'product_id'    => 4,
    //             'discount'      => 40,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 2,
    //             'product_id'    => 9,
    //             'discount'      => 80,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 2,
    //             'product_id'    => 7,
    //             'discount'      => 10,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 2,
    //             'product_id'    => 10,
    //             'discount'      => 25,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 2,
    //             'product_id'    => 12,
    //             'discount'      => 30,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 1,
    //             'product_id'    => 1,
    //             'discount'      => 50,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 3,
    //             'product_id'    => 2,
    //             'discount'      => 40,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 3,
    //             'product_id'    => 12,
    //             'discount'      => 80,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //         [
    //             'flash_sale_id' => 3,
    //             'product_id'    => 7,
    //             'discount'      => 10,
    //             'discount_type' => 'flat',
    //             'status'        => 'pending',
    //             'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
    //             'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
    //         ],
    //     ];

    //     foreach ($flash_sale_dumb_data as $item) {
    //         FlashSale::create($item);
    //     }

    //     foreach ($flash_sale_products_dumb_data as $item){
    //         FlashSaleProduct::create($item);
    //     }
    }
}
