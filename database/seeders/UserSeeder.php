<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::updateOrCreate([
        //     'role_id' => Role::where('slug', 'admin')->first()->id,
        //     'name' => 'Admin',
        //     'email' => 'admin@klaudio-fashion.com',
        //     'password' => Hash::make('admin123'),
        //     'phone' => '+3556965892',
        //     'activated' => true,
        // ]);
        
         $user = User::updateOrCreate([
            'role_id' => Role::where('slug', 'customer')->first()->id,
            'name' => 'Joe Doe',
            'email' => 'customer@mail.com',
            'password' => Hash::make('customer123'),
            'phone' => '+3556965000',
            'activated' => true,
        ]);

        $customer = Customer::create([
                'id' => 6,
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
                'created_by' => 1,
        ]);

        CustomerAddress::create([
            'customer_id' => $customer->id,
            'country_id' => 1,
            'city_id' => 1,
            'cost' => 200,
            'address' => 'Rr.Panorama, Tirane, Albania'
        ]);
        
        
        // User::updateOrCreate([
        //     'role_id' => Role::where('slug', 'assistant')->first()->id,
        //     'name' => 'Sales Assistant',
        //     'email' => 'assistant@klaudio-fashion.com',
        //     'password' => Hash::make('sales123'),
        //     'phone' => '+3556965000',
        //     'activated' => true,
        // ]);
    }
}
