<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->delete();

    
        Admin::updateOrCreate([
            'role_id' => Role::where('slug', 'admin')->first()->id,
            'name' => 'Admin',
            'email' => 'admin@klaudio-fashion.com',
            'password' => Hash::make('admin123')
        ]);
        

        // Admin::updateOrCreate([
        //     'role_id' => Role::where('slug', 'assistant')->first()->id,
        //     'name' => 'Sales Assistant',
        //     'email' => 'assistant@klaudio-fashion.com',
        //     'password' => Hash::make('sales123'),
        // ]);

    }
}
