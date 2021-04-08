<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            //TableSeeder::class,
            CategorySeeder::class,
            //MemberSeeder::class,
            //ItemSeeder::class,
            //SessionSeeder::class,
            AccountSeeder::class,

        ]);

    }
}
