<?php

namespace Database\Seeders;

use App\Models\tertiary;
use Illuminate\Database\Seeder;

class TertiarySeeder extends Seeder
{

    public function run(){
        $current_assets = ['stock'];
        $this->create($current_assets,1);
    }
    protected function create($data,$id){
        foreach ($data as $item){
            tertiary::create([
                'name' => $item,
                'secondary_id' => $id
            ]);
        }
    }
}
