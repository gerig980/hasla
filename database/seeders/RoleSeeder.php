<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions = Permission::all();
        
        Role::updateOrCreate([
            'name' => 'admin',
            'slug' => 'admin',
            'note' => 'Admin Role',
            'deletable' => false
        ])->permissions()->sync($adminPermissions->pluck('id'));
        
        Role::updateOrCreate([
            'name' => 'Sales Assistant',
            'slug' => 'sales',
            'note' => 'Sales Assistant Role',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'Customer',
            'slug' => 'customer',
            'note' => 'Customer Role',
            'deletable' => false
        ]);
        
        Role::updateOrCreate([
            'name' => 'Marketing',
            'slug' => 'marketing',
            'note' => 'Marketing Role',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'Finance',
            'slug' => 'finance',
            'note' => 'Finance Role',
            'deletable' => false
        ]);

    }
}
