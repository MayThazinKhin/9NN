<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\Role;
use App\Models\Table;
use Database\Factories\ItemFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call([
            MarkerSeeder::class,
            Table::factory(20)->create(),
            Category::factory(20)->create(),
            Item::factory(20)->create()
        ]);

    }
}
