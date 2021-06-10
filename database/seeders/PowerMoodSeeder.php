<?php

namespace Database\Seeders;

use App\Models\PowerMood;
use Illuminate\Database\Seeder;

class PowerMoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PowerMood::create([
            'start_date'=> CurrentTime(),
            'end_date' => CurrentTime()
        ]);

        PowerMood::create([
            'start_date'=> CurrentTime(),
            'end_date' => null
        ]);
    }
}
