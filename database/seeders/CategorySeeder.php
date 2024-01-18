<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_dumb_data = [
            [
                'parent_id'     => null,
                'user_id'       => 1,
                'name'          => 'FEMRA',
                'slug'          => 'femra',
                'banner'        => 'test',
                'icon'          => 'kemishe.png',
                'url'           => '/femra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => null,
                'user_id'       => 1,
                'name'          => 'MESHKUJ',
                'slug'          => 'meshkuj',
                'banner'        => 'test',
                'icon'          => 'bluze.png',
                'url'           => '/meshkuj',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => null,
                'user_id'       => 1,
                'name'          => 'KËPUCË & CANTA',
                'slug'          => 'kepuce-canta',
                'banner'        => 'test',
                'icon'          => 'dresses.png',
                'url'           => '/kepuce-canta',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => null,
                'user_id'       => 1,
                'name'          => 'SHTËPI & MOBILJE',
                'slug'          => 'shtepi-mobilje',
                'banner'        => 'test',
                'icon'          => 'sportive.png',
                'url'           => '/shtepi-mobilje',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => null,
                'user_id'       => 1,
                'name'          => 'AKSESORË',
                'slug'          => 'aksesore',
                'banner'        => 'test',
                'icon'          => 'sportive.png',
                'url'           => '/aksesore',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => null,
                'user_id'       => 1,
                'name'          => 'UNDERWEAR & SOCKS ',
                'slug'          => 'underwear-socks',
                'banner'        => 'test',
                'icon'          => 'sportive.png',
                'url'           => '/underwear-socks',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'FUSTANE',
                'slug'          => 'fustane',
                'banner'        => 'test',
                'icon'          => 'dresses.png',
                'url'           => '/fustane',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'BLUZA',
                'slug'          => 'bluza-femra',
                'banner'        => 'test',
                'icon'          => 'bluze.png',
                'url'           => '/bluza',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'PANTALLONA',
                'slug'          => 'pantallona-femra',
                'banner'        => 'test',
                'icon'          => 'trousers.png',
                'url'           => '/pantallona',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'STRECE',
                'slug'          => 'strece',
                'banner'        => 'test',
                'icon'          => 'sportive.png',
                'url'           => '/strece',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'KOSTUME',
                'slug'          => 'kostume',
                'banner'        => 'test',
                'icon'          => 'kostum.png',
                'url'           => '/kostume',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'KËMISHA',
                'slug'          => 'kemisha',
                'banner'        => 'test',
                'icon'          => 'kemishe.png',
                'url'           => '/kemisha',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'FUNDE',
                'slug'          => 'funde',
                'banner'        => 'test',
                'icon'          => 'fund.png',
                'url'           => '/funde',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'XHAKETA',
                'slug'          => 'xhaketa',
                'banner'        => 'test',
                'icon'          => 'kemishe.png',
                'url'           => '/xhaketa',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'JELEKË',
                'slug'          => 'jeleke',
                'banner'        => 'test',
                'icon'          => 'bluze.png',
                'url'           => '/jeleke',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'PALLTO',
                'slug'          => 'pallto',
                'banner'        => 'test',
                'icon'          => 'sportive.png',
                'url'           => '/pallto',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'XHUPA',
                'slug'          => 'xhupa',
                'banner'        => 'test',
                'icon'          => 'trousers.png',
                'url'           => '/xhupa',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 1,
                'user_id'       => 1,
                'name'          => 'PIZHAME',
                'slug'          => 'pizhame-meshkuj',
                'banner'        => 'test',
                'icon'          => 'bluze.png',
                'url'           => '/pizhame',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'BLUZA',
                'slug'          => 'bluza-meshkuj',
                'banner'        => 'test',
                'icon'          => 'bluze.png',
                'url'           => '/bluza',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'TUTA',
                'slug'          => 'tuta',
                'banner'        => 'test',
                'icon'          => 'sportive.png',
                'url'           => '/tuta',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'PANTALLONA',
                'slug'          => 'pantallona-meshkuj',
                'banner'        => 'test',
                'icon'          => 'trousers.png',
                'url'           => '/pantallona',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'XHUPA',
                'slug'          => 'xhupa-meshkuj',
                'banner'        => 'test',
                'icon'          => 'trousers.png',
                'url'           => '/xhupa',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'JELEKË',
                'slug'          => 'jeleke-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/jeleke',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'XHAKETA',
                'slug'          => 'xhaketa-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/xhaketa',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'KËMISHA',
                'slug'          => 'kemisha-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/kemisha',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'KOSTUME',
                'slug'          => 'kostume-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/kostume',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'RROBA BANJE',
                'slug'          => 'rroba-banje',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/rroba-banje',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 2,
                'user_id'       => 1,
                'name'          => 'PIZHAME',
                'slug'          => 'pizhame',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/pizhame',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'ÇIZME',
                'slug'          => 'cizme',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/cizme',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'KAMBALE',
                'slug'          => 'kambale',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/kambale',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'KËPUCË',
                'slug'          => 'kepuce',
                'banner'        => 'kepuce',
                'icon'          => '',
                'url'           => '/kepuce',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'SANDALE',
                'slug'          => 'sandale',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/sandale',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'SHAPKA',
                'slug'          => 'shapka',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/shapka',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'ATLETE',
                'slug'          => 'atlete',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/atlete',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'PANDOFLA',
                'slug'          => 'pandofla',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/pandofla',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'ÇANTA',
                'slug'          => 'canta',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/canta',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'PORTOFOLA',
                'slug'          => 'portofola',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/portofola',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 3,
                'user_id'       => 1,
                'name'          => 'SETE VALIXHE',
                'slug'          => 'sete-valixhe',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/sete-valixhe',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 4,
                'user_id'       => 1,
                'name'          => 'TUALET',
                'slug'          => 'tualet',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/tualet',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 4,
                'user_id'       => 1,
                'name'          => 'TAVOLINA',
                'slug'          => 'tavolina',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/tavolina',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 5,
                'user_id'       => 1,
                'name'          => 'KAPUÇA',
                'slug'          => 'kapuca',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/kapuca',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 5,
                'user_id'       => 1,
                'name'          => 'SHALLE',
                'slug'          => 'shalle',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/shalle',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 5,
                'user_id'       => 1,
                'name'          => 'PELERINA',
                'slug'          => 'pelerina',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/pelerina',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 5,
                'user_id'       => 1,
                'name'          => 'DORASHKA',
                'slug'          => 'dorashka',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/dorashka',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 5,
                'user_id'       => 1,
                'name'          => 'KAPELE',
                'slug'          => 'kapele',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/kapele',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 5,
                'user_id'       => 1,
                'name'          => 'RRIPA',
                'slug'          => 'rripa',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/rripa',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'BLUZA MËNGË TË SHKURTRA',
                'slug'          => 'bluza-menge-shkurtra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/bluza-menge-shkurtra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'BLUZA MËNGË TË GJATA',
                'slug'          => 'bluza-menge-gjata',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/bluza-menge-gjata',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'KANATJERE',
                'slug'          => 'kanatjere',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/kanatjere',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'BOXER',
                'slug'          => 'boxer',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/boxer',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'BIKINI',
                'slug'          => 'bikini',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/bikini',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'REÇIPETA',
                'slug'          => 'recipeta',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/recipeta',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'ÇORAPE',
                'slug'          => 'corape',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/corape',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'STREÇE TERMALE',
                'slug'          => 'strece-termale',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/strece-termale',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 6,
                'user_id'       => 1,
                'name'          => 'BLUZA TERMALE',
                'slug'          => 'bluza-termale',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/bluza-termale',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 8,
                'user_id'       => 1,
                'name'          => 'MËNGË TË SHKURTRA',
                'slug'          => 'menge-te-shkurtra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/menge-te-shkurtra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 8,
                'user_id'       => 1,
                'name'          => 'PAMBUK',
                'slug'          => 'pambuk',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/pambuk',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'parent_id'     => 8,
                'user_id'       => 1,
                'name'          => 'GOLFE',
                'slug'          => 'golfe',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/golfe',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'parent_id'     => 8,
                'user_id'       => 1,
                'name'          => 'HOODIE',
                'slug'          => 'femra-hoodie',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/hoodie',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 8,
                'user_id'       => 1,
                'name'          => 'PULOVRA',
                'slug'          => 'pulovra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/pulovra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 9,
                'user_id'       => 1,
                'name'          => 'XHINS',
                'slug'          => 'xhins',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/xhins',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 9,
                'user_id'       => 1,
                'name'          => 'DOK',
                'slug'          => 'pantallona-dok-femra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/dok',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 9,
                'user_id'       => 1,
                'name'          => 'KLASIKE',
                'slug'          => 'pantallona-klasike-femra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/klasike',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 9,
                'user_id'       => 1,
                'name'          => 'XHINS TE SHKURTRA',
                'slug'          => 'xhins-te-shkurtra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/xhins-te-shkurtra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 13,
                'user_id'       => 1,
                'name'          => 'KLASIKE',
                'slug'          => 'pantallona-klasike-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/klasike',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 13,
                'user_id'       => 1,
                'name'          => 'SPORTIVE',
                'slug'          => 'meshkuj-sportive',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/sportive',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 14,
                'user_id'       => 1,
                'name'          => 'KLASIKE',
                'slug'          => 'xhaketa-klasike',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/klasike',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 18,
                'user_id'       => 1,
                'name'          => 'VERE',
                'slug'          => 'pizhame-vere-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/vere',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 18,
                'user_id'       => 1,
                'name'          => 'DIMËR',
                'slug'          => 'pizhame-dimer-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/dimer',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 19,
                'user_id'       => 1,
                'name'          => 'MËNGË TË SHKURTRA',
                'slug'          => 'menge-shkurtra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/menge-shkurtra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 19,
                'user_id'       => 1,
                'name'          => 'PAMBUK',
                'slug'          => 'bluze-pambuk',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/pambuk',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 19,
                'user_id'       => 1,
                'name'          => 'HOODIE',
                'slug'          => 'meshkuj-hoodie',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/hoodie',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 19,
                'user_id'       => 1,
                'name'          => 'PULOVRA',
                'slug'          => 'meshkuj-pulovra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/pulovra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 20,
                'user_id'       => 1,
                'name'          => 'TË GJATA',
                'slug'          => 'te-gjata',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/te-gjata',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 20,
                'user_id'       => 1,
                'name'          => 'TË SHKURTRA',
                'slug'          => 'te-shkurtra',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/te-shkurtra',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 21,
                'user_id'       => 1,
                'name'          => 'XHINS',
                'slug'          => 'meshkuj-xhins',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/xhins',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 21,
                'user_id'       => 1,
                'name'          => 'DOK',
                'slug'          => 'meshkuj-dok',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/dok',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 21,
                'user_id'       => 1,
                'name'          => 'KLASIKE',
                'slug'          => 'meshkuj-klasike',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/klasike',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 24,
                'user_id'       => 1,
                'name'          => 'SPORTIVE',
                'slug'          => 'kostume-sportive-meshkuj',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/sportive',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 24,
                'user_id'       => 1,
                'name'          => 'KLASIKE',
                'slug'          => 'kostume-klasike-meshkuj',
                'banner'        => 'klasike',
                'icon'          => '',
                'url'           => '/klasike',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 26,
                'user_id'       => 1,
                'name'          => 'SPORTIVE',
                'slug'          => 'sportive',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/sportive',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 28,
                'user_id'       => 1,
                'name'          => 'VERË',
                'slug'          => 'vere',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/vere',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 28,
                'user_id'       => 1,
                'name'          => 'DIMËR',
                'slug'          => 'dimer',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/dimer',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 36,
                'user_id'       => 1,
                'name'          => 'MINI ÇANTA',
                'slug'          => 'mini-canta',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/mini-canta',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 36,
                'user_id'       => 1,
                'name'          => 'ÇANTA SHPINE',
                'slug'          => 'canta-shpine',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/canta-shpine',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 36,
                'user_id'       => 1,
                'name'          => 'ÇANTA PLAZHI',
                'slug'          => 'canta-plazhi',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/canta-plazhi',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 36,
                'user_id'       => 1,
                'name'          => 'ÇANTA UDHËTIMI',
                'slug'          => 'canta-udhetimi',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/canta-udhetimi',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'parent_id'     => 39,
                'user_id'       => 1,
                'name'          => 'SETE TUALETI',
                'slug'          => 'sete-tualeti',
                'banner'        => 'test',
                'icon'          => '',
                'url'           => '/sete-tualeti',
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ];

        foreach ($category_dumb_data as $item) {
            Category::create($item);
        }
    }
}
