<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tax;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Tax::create([
            'title'      => 'VAT',
            'percentage' => 20,
            'priority'   => 1,
            'status'     => 1,
        ]);

        Tax::create([
            'title'      => 'None',
            'percentage' => 0,
            'priority'   => 2,
            'status'     => 1,
        ]);
    }
}
