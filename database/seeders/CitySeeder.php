<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertCities(1);
    }

    private function insertCities($country_id)
    {
        $albanianCities = [
            [
                'id' => 1,
                'name' => 'Tiranë',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Shkodër',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => 'Elbasan',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'name' => 'Vlorë',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'name' => 'Korçë',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'name' => 'Fier',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'name' => 'Berat',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'name' => 'Lushnje',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'name' => 'Pogradec',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'name' => 'Kavaje',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'name' => 'Lac',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'name' => 'Lezhe',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 14,
                'name' => 'Kukes',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 15,
                'name' => 'Gjirokaster',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 16,
                'name' => 'Patosi',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 17,
                'name' => 'Kruje',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 18,
                'name' => 'Kucove',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 19,
                'name' => 'Sarande',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 20,
                'name' => 'Peshkopi',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 21,
                'name' => 'Burrel',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 22,
                'name' => 'Cerrik',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 23,
                'name' => 'Skrapar',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 24,
                'name' => 'Shijak',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 25,
                'name' => 'Librazhd',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 26,
                'name' => 'Tepelena',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 27,
                'name' => 'Gramsh',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 28,
                'name' => 'Policani',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 29,
                'name' => 'Bulqize',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 30,
                'name' => 'Permeti',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 31,
                'name' => 'Fushe Kruje',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 32,
                'name' => 'Kamza',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 33,
                'name' => 'Rreshen',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 34,
                'name' => 'Ballsh',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 35,
                'name' => 'Mamurras',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 36,
                'name' => 'Bajram Curri',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 37,
                'name' => 'Erseke',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 38,
                'name' => 'Peqini',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 39,
                'name' => 'Divjake',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 40,
                'name' => 'Selenica',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 41,
                'name' => 'Bilisht',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 42,
                'name' => 'Roskoveci',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 43,
                'name' => 'Kelcyra',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 44,
                'name' => 'Puke',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 45,
                'name' => 'Memaliaj',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 46,
                'name' => 'Rrogozhina',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 47,
                'name' => 'Ura Vajgurore',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 48,
                'name' => 'Himara',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 49,
                'name' => 'Delvine',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 50,
                'name' => 'Vora',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 51,
                'name' => 'Koplik',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 52,
                'name' => 'Maliq',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 53,
                'name' => 'Prrenjas',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 54,
                'name' => 'Shtermeni',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 56,
                'name' => 'Libohove',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 57,
                'name' => 'Orikumi',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 58,
                'name' => 'Fushe Arrez',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 59,
                'name' => 'Shengjin',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 60,
                'name' => 'Rubiku',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 61,
                'name' => 'Milot',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 62,
                'name' => 'Leskoviku',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 63,
                'name' => 'Konispoli',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 65,
                'name' => 'Krraba',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 66,
                'name' => 'Durres',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 67,
                'name' => 'Has',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 68,
                'name' => 'Bajze',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 69,
                'name' => 'Velipoje',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 71,
                'name' => 'Bushat',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 72,
                'name' => 'Vau Dejes',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 73,
                'name' => 'Tropoje',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 74,
                'name' => 'Reps',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 75,
                'name' => 'Maqellare',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 76,
                'name' => 'Shupenze',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 77,
                'name' => 'Klos',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 78,
                'name' => 'Ulez',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 80,
                'name' => 'Manez',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 81,
                'name' => 'Sukth',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 82,
                'name' => 'Durres Plazh',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 83,
                'name' => 'Shkozet',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 84,
                'name' => 'Peqin Pajove',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 85,
                'name' => 'Paper',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 86,
                'name' => 'Levan',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 87,
                'name' => 'Lushnje Fier Shegan',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 88,
                'name' => 'Belsh',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 89,
                'name' => 'Fier Cakran',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 90,
                'name' => 'Vlore Novosele',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 91,
                'name' => 'Dhermi',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 92,
                'name' => 'Borsh',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 93,
                'name' => 'Lukove',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 94,
                'name' => 'Qeparo',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 95,
                'name' => 'Sarande Livadhja',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 96,
                'name' => 'Devoll',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 97,
                'name' => 'Dibër',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 98,
                'name' => 'Dropull',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 99,
                'name' => 'Finiq',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 100,
                'name' => 'Kolonjë',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 101,
                'name' => 'Kurbin',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 102,
                'name' => 'Malësi e Madhe',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 103,
                'name' => 'Mallakastër',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 104,
                'name' => 'Mat',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 105,
                'name' => 'Mirditë',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'id' => 106,
                'name' => 'Pustec',
                'country_id'    => $country_id,
                'cost'          => 300,
                'status'        => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]   
        ];

        foreach ($albanianCities as $city)
        City::create($city);
    } 
}
