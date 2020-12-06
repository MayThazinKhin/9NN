<?php

namespace Database\Seeders;

use App\Models\Tertiary;
use Illuminate\Database\Seeder;

class TertiarySeeder extends Seeder
{

    public function run(){
        $current_assets = ['stock'];
        $this->create($current_assets,1);
    }

    protected function create($data,$id){
        foreach ($data as $item){
            Tertiary::create([
                'name' => $item,
                'secondary_id' => $id
            ]);
        }
    }
}
