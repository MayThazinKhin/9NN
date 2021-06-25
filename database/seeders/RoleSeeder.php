<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(){
        $roles = ['admin','cashier','marker','accountant','kitchen_staff','bar_staff','shop_staff'];
        foreach ($roles as $role){
            Role::create([
                'name' => $role
            ]);
        }
    }
}
