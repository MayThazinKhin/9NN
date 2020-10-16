<?php

namespace Database\Seeders;

use App\Models\Marker;
use Illuminate\Database\Seeder;

class MarkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<6;$i++){
            Marker::create([
                'name' => 'marker_'.$i,
                'password' => 'password',
                'fee' => 100 * $i
            ]);
        }
    }
}
