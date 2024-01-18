<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner_dumb_data = [

            [
                'order'         => 1,
                'image'         => '1760x500-Bannerfirst.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_1',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 2,
                'image'         => 'Klaudio-Fashion-Banners-1760x500.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_1',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 3,
                'image'         => '1760x500-Banner1.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_1',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 4,
                'image'         => '854x500-banner1.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_2',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 5,
                'image'         => '854x500-banner2.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_2',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 6,
                'image'         => '854x500-banner3.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_2',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 7,
                'image'         => '854x500-banner4.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_2',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 8,
                'image'         => '854x500-banner6.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_2',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'         => 9,
                'image'         => '854x500-banner5.jpg',
                'link'          => '/all-products',
                'banner_type'   => 'col_2',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        foreach ($banner_dumb_data as $item) {
            Banner::create($item);
        }
    }
}
