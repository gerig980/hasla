<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection_dumb_data = [

            [
                'name'          => 'Me te Shiturat',
                'slug'          => 'me-te-shiturat',
                'description'   => 'Produktet me te shitura',
                'products'      => '5,6',
                'icon'          => 'dress-85783.jpeg',
                'image'         => '1760x500 Banner1-65793.jpg',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Oferta Speciale',
                'slug'          => 'oferta-speciale',
                'description'   => 'Produktet me oferta me te mira',
                'products'      => '5,6',
                'icon'          => '',
                'image'         => '1760x500-Bannerfirst.jpg',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Me te Rejat',
                'slug'          => 'me-te-rejat',
                'description'   => 'Produktet me te reja',
                'products'      => '5,6',
                'icon'          => '',
                'image'         => 'b-slider0kl.jpg',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Klaudio Fashion Basics',
                'slug'          => 'klaudio-fashion-basics',
                'description'   => 'Produkte nga klaudio fashion',
                'products'      => '5,6',
                'icon'          => '',
                'image'         => 'Klaudio-Fashion-Banners-1760x500.jpg',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        foreach ($collection_dumb_data as $item) {
            Collection::create($item);
        }
    }
}
