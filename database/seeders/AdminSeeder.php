<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'password' => 'password',
            'role_id' => 1
        ]);

        Admin::create([
            'name' => 'casher',
            'password' => 'password',
            'role_id' => 2
        ]);
    }
}
