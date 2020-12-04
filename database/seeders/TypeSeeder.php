<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['shop','menu','bar'];
        foreach ($types as $type){
            Type::create([
                'name' => $type
            ]);
        }

    }
}
