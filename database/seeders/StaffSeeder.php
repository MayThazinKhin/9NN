<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'name' => 'staff',
            'password' => 'password',
            'role_id' => 1
        ]);

        Staff::create([
            'name' => 'casher',
            'password' => 'password',
            'role_id' => 2
        ]);

        for ($i=1; $i<6;$i++){
            Staff::create([
                'name' => 'marker_'.$i,
                'password' => 'password',
                'role_id' => 3,
                'fee' => 100 * $i
            ]);
        }
    }
}
