<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider_dumb_data = [

            [
                'order'          => 2,
                'status'         => 1,
                'mobile_version' => 0,
                'action_type'    => 'product',
                'link'           => '/all-products',
                'bg_image'       => 'b-slider0kl.jpg',
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'          => 3,
                'status'         => 1,
                'mobile_version' => 0,
                'action_type'    => 'product',
                'link'           => '/all-products',
                'bg_image'       => 'banner4.jpg',
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'order'          => 1,
                'status'         => 1,
                'mobile_version' => 0,
                'action_type'    => 'product',
                'link'           => '/all-products',
                'bg_image'       => 'Slider-Klaudio.gif',
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        foreach ($slider_dumb_data as $item) {
            Slider::create($item);
        }
    }
}
