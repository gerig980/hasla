<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttributeValue;
use Carbon\Carbon;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $attributesValues = [
            [
                'attribute_id'     => 1,
                'value'            => 'S',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => 'M',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => 'L',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => 'XS',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => 'XL',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => 'XXL',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => 'XXXL',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => '34',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => '36',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => '38',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'attribute_id'     => 1,
                'value'            => '40',
                'image'            => '',
                'color_code'       => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        foreach ($attributesValues as $item) {
            AttributeValue::create($item);
        }
    }
}
