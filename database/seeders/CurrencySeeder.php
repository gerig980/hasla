<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();

        Currency::truncate();

        $currencies = [
            [
                'title'            => 'LEK',
                'symbol'           => 'ALL',
                'is_prefix_symbol' => true,
                'order'            => 0,
                'decimals'         => 2,
                'is_default'       => 1,
                'exchange_rate'    => 1,
            ]
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
