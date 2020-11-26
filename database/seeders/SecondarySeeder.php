<?php

namespace Database\Seeders;

use App\Models\Secondary;
use Illuminate\Database\Seeder;

class SecondarySeeder extends Seeder
{
    public function run()
    {
        $assets = ['current_asset','non_current_asset'];
        $incomes = ['tables','foods','tax','used_bottle_selling','shop','renting','others'];
        $this->create($assets,1);
        $this->create($incomes,2);
    }

    protected function create($data,$id){
        foreach ($data as $item){
            Secondary::create([
                'name' => $item,
                'primary_id' => $id
            ]);
        }
    }
}
