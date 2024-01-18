<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 67,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 1,
            'collection_id'             => 1,
            'up_sell_product_ids'       => '4,2,3,6,7',
            'name'                      => 'Bluze',
            'slug'                      => 'bluze',
            'sku'                       => 'L21323ewewewGf',
            'images'                    => '["kapele.jpg","xhins.jpg","top.jpg"]',
            'colors'                    => '["2","3","4"]',
            'selected_variants_ids'         => '["6","7","9"]',
            'thumbnail'                 => '"bluze.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '400.00',
            'current_stock'             => '50',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 20,
            'filter_attribute_id'       => 2,
            'size_guide_id'             => 2,
            'collection_id'             => 2,
            'up_sell_product_ids'       => '1,3,6,12',
            'name'                      => 'Xhins',
            'slug'                      => 'xhins',
            'sku'                       => 'L21323e23233Gf',
            'images'                    => '["croptop.jpg","xhins.jpg","top.jpg"]',
            'colors'                    => '["2","4"]',
            'selected_variants_ids'         => '["7","10"]',
            'thumbnail'                 => '"xhins.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '1200.00',
            'current_stock'             => '30',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 10,
            'filter_attribute_id'       => 3,
            'size_guide_id'             => 3,
            'collection_id'             => 3,
            'up_sell_product_ids'       => '9,2,8,11',
            'name'                      => 'Kanatier',
            'slug'                      => 'kanatier',
            'sku'                       => 'L21113e23233Gf',
            'images'                    => '["croptop.jpg","kapele.jpg","top.jpg"]',
            'colors'                    => '["1"]',
            'selected_variants_ids'         => '["8"]',
            'thumbnail'                 => '"top.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '200.00',
            'current_stock'             => '40',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 52,
            'filter_attribute_id'       => 4,
            'size_guide_id'             => 4,
            'collection_id'             => 4,
            'name'                      => 'kapele',
            'slug'                      => 'kapele',
            'sku'                       => 'L2111433e23233Gf',
            'images'                    => '["croptop.jpg","kapele.jpg","xhins.jpg"]',
            'colors'                    => '["2"]',
            'selected_variants_ids'         => '["9"]',
            'thumbnail'                 => '"kapele.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '100.00',
            'current_stock'             => '60',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 31,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'Fund',
            'slug'                      => 'fund',
            'sku'                       => 'Kiiyewy8388237',
            'images'                    => '["kapele.jpg","xhins.jpg","top.jpg"]',
            'colors'                    => '["3"]',
            'selected_variants_ids'         => '["10"]',
            'thumbnail'                 => '"fund.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '500.00',
            'current_stock'             => '40',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 24,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'Fustan',
            'slug'                      => 'fustan',
            'sku'                       => 'rqwrewer12342',
            'images'                    => '["croptop.jpg","kapele.jpg","xhins.jpg"]',
            'colors'                    => '["2"]',
            'selected_variants_ids'         => '["11"]',
            'thumbnail'                 => '"fustan.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '600.00',
            'current_stock'             => '70',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 25,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'Tuta',
            'slug'                      => 'tuta',
            'sku'                       => '555554444523ew',
            'images'                    => '["croptop.jpg","xhins.jpg","top.jpg"]',
            'colors'                    => '["2"]',
            'selected_variants_ids'         => '["12"]',
            'thumbnail'                 => '"tuta.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '300.00',
            'current_stock'             => '55',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 83,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'Atlete',
            'slug'                      => 'atlete',
            'sku'                       => '55554e664664434',
            'images'                    => '["kapele.jpg","xhins.jpg","top.jpg"]',
            'colors'                    => '["1"]',
            'selected_variants_ids'         => '["13"]',
            'thumbnail'                 => '"atlete.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '200.00',
            'current_stock'             => '60',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 57,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'Rroba banje',
            'slug'                      => 'rroba-banje',
            'sku'                       => '55554e664114434',
            'images'                    => '["croptop.jpg","kapele.jpg","xhins.jpg"]',
            'colors'                    => '["3"]',
            'selected_variants_ids'         => '["14"]',
            'thumbnail'                 => '"bikini.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '200.00',
            'current_stock'             => '60',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 28,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'CropTop',
            'slug'                      => 'crop-top',
            'sku'                       => '55554e664221434',
            'images'                    => '["croptop.jpg","kapele.jpg","top.jpg"]',
            'colors'                    => '["3"]',
            'selected_variants_ids'         => '["15"]',
            'thumbnail'                 => '"croptop.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '200.00',
            'current_stock'             => '60',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 77,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'Xhup',
            'slug'                      => 'xhup',
            'sku'                       => '55554e664634434',
            'images'                    => '["croptop.jpg","xhins.jpg","top.jpg"]',
            'colors'                    => '["2"]',
            'selected_variants_ids'         => '["16"]',
            'thumbnail'                 => '"xhup.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '200.00',
            'current_stock'             => '60',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'added_by'                  => 1,
            'category_id'               => 26,
            'filter_attribute_id'       => 1,
            'size_guide_id'             => 3,
            'collection_id'             => 1,
            'name'                      => 'Jumpsuit',
            'slug'                      => 'jumpsuit',
            'sku'                       => '55554e634664434',
            'images'                    => '["kapele.jpg","xhins.jpg","top.jpg"]',
            'colors'                    => '["3"]',
            'selected_variants_ids'         => '["6"]',
            'thumbnail'                 => '"jumpsuit.jpg"',
            'description'               => 'Lorem ipsum dolores ist amet',
            'has_variant'               => 1,
            'price'                     => '200.00',
            'current_stock'             => '60',
            'created_at' =>             Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>             Carbon::now()->format('Y-m-d H:i:s')
        ]);



        DB::table('product_stocks')->insert([
            'variant_ids' => '2-6',
            'product_id' => 1,
            'name'  => 'Bluze-variant',
            'sku' => 'bv2022',
            'price' => '500',
            'current_stock' => 23,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '3-7',
            'product_id' => 1,
            'name'  => 'Bluze-v2-variant',
            'sku' => 'bv-2-2022',
            'price' => '500',
            'current_stock' => 23,
            'image' => '["top.jpg","xhins.jpg","croptop.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '4-9',
            'product_id' => 1,
            'name'  => 'Bluze-v3-variant',
            'sku' => 'bv-3-2022',
            'price' => '500',
            'current_stock' => 23,
            'image' => '["xhins.jpg","croptop.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '2-7',
            'product_id' => 2,
            'name'  => 'Xhins-variant',
            'sku' => 'xh2022',
            'price' => '700',
            'current_stock' => 83,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '4-10',
            'product_id' => 2,
            'name'  => 'Xhins-v2-variant',
            'sku' => 'xh-2-2022',
            'price' => '700',
            'current_stock' => 83,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '1-8',
            'product_id' => 3,
            'name'  => 'Kanatier-variant',
            'sku' => 'kan2022',
            'price' => '200',
            'current_stock' => 13,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '2-9',
            'product_id' => 4,
            'name'  => 'kapele-variant',
            'sku' => 'kap2022',
            'price' => '600',
            'current_stock' => 3,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '3-10',
            'product_id' => 5,
            'name'  => 'Fund-variant',
            'sku' => 'fu2022',
            'price' => '900',
            'current_stock' => 53,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '2-11',
            'product_id' => 6,
            'name'  => 'Fustan-variant',
            'sku' => 'fust2022',
            'price' => '560',
            'current_stock' => 13,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '2-2',
            'product_id' => 7,
            'name'  => 'Tuta-variant',
            'sku' => 'tu2022',
            'price' => '400',
            'current_stock' => 23,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '1-1',
            'product_id' => 8,
            'name'  => 'Atlete-variant',
            'sku' => 'atl2022',
            'price' => '1200',
            'current_stock' => 43,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '3-8',
            'product_id' => 9,
            'name'  => 'Rroba banje-variant',
            'sku' => 'rrbnj2022',
            'price' => '450',
            'current_stock' => 53,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '3-7',
            'product_id' => 10,
            'name'  => 'CropTop-variant',
            'sku' => 'CropTop2022',
            'price' => '300',
            'current_stock' => 3,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '2-6',
            'product_id' => 11,
            'name'  => 'Xhup-variant',
            'sku' => 'xhup2022',
            'price' => '1500',
            'current_stock' => 3,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '3-6',
            'product_id' => 12,
            'name'  => 'Jumpsuit-variant',
            'sku' => 'jumpsuit2022',
            'price' => '800',
            'current_stock' => 14,
            'image' => '["croptop.jpg","xhins.jpg","top.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '4-6',
            'product_id' => 12,
            'name'  => 'Jumpsuit-variant',
            'sku' => 'jumpsuit2022',
            'price' => '800',
            'current_stock' => 14,
            'image' => '["top.jpg","xhins.jpg","croptop.jpg"]'
        ]);
        DB::table('product_stocks')->insert([
            'variant_ids' => '1-6',
            'product_id' => 12,
            'name'  => 'Jumpsuit-variant',
            'sku' => 'jumpsuit2022',
            'price' => '800',
            'current_stock' => 14,
            'image' => '["xhins.jpg","croptop.jpg","top.jpg"]'
        ]);
    }
}
