<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(){
       //Category::factory(20)->create();
        Category::create([
            'name' => 'chalk',
            'type_id' => 1
        ]);
        Category::create([
            'name' => 'tip',
            'type_id' => 1
        ]);
        Category::create([
            'name' => 'salad',
            'type_id' => 2
        ]);
        Category::create([
            'name' => 'soup',
            'type_id' => 2
        ]);
        Category::create([
            'name' => 'fast food',
            'type_id' => 2
        ]);
        Category::create([
            'name' => 'fresh juice',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'mocktail',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'shisha',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'beer',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'energy drink',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'coffee',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'milk shake',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'smoothies',
            'type_id' => 3
        ]);
        Category::create([
            'name' => 'general 1',
            'type_id' => 4
        ]);
        Category::create([
            'name' => 'general 2',
            'type_id' => 4
        ]);

    }
}
