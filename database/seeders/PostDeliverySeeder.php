<?php

namespace Database\Seeders;

use App\Models\PostDelivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostDelivery::create([
            'admin_id' => 1,
            'name' => 'In House Post',
            'key' => 'in-house',
        ]);

        PostDelivery::create([
            'admin_id' => 1,
            'name' => 'Posta ADEX',
            'key' => 'adex',
        ]);
    }
}
