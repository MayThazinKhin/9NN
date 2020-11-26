<?php

namespace Database\Seeders;

use App\Models\Primary;
use Illuminate\Database\Seeder;

class PrimarySeeder extends Seeder
{
    public function run(){
        $primaries = ['assets','income'];
        foreach ($primaries as $primary){
            Primary::create([
                'name' => $primary
            ]);
        }
    }
}
