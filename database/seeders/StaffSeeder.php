<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run()
    {
        Staff::create([
            'name' => 'admin',
            'password' => 'password',
            'role_id' => 1
        ]);

        Staff::create([
            'name' => 'cashier',
            'password' => 'password',
            'role_id' => 2
        ]);

        for ($i=1; $i<6;$i++){
            Staff::create([
                'name' => 'marker_'.$i,
                'password' => 'password',
                'role_id' => 3,
                'fee' => 100 * $i,
                'fee_paid' => 50 * $i
            ]);
        }
        Staff::create([
            'name' => 'accountant',
            'password' => 'password',
            'role_id' => 4
        ]);
        Staff::create([
            'name' => 'kitchen_staff',
            'password' => 'password',
            'role_id' => 5
        ]);
        Staff::create([
            'name' => 'bar_staff',
            'password' => 'password',
            'role_id' => 6
        ]);
    }
}
