<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(){
        $shops = ['chalk','tip'];
        foreach($shops as $shop){
            Category::create([
                'name' =>$shop,
                'type_id' => 1,
                'is_countable' => true
            ]);
        }

        $menus = ['salad','soup','fast food'];
        foreach ($menus as $menu){
            Category::create([
                'name' => $menu,
                'type_id' => 2,
                'is_countable' => false
            ]);
        }

        $countable_bars = ['beer','energy drink', 'coffee'];
        foreach ($countable_bars as $countable_bar){
            Category::create([
                'name' => $countable_bar,
                'type_id' => 3,
                'is_countable' => true
            ]);
        }

        $uncountable_bars = ['fresh juice','mocktail','shisha', 'coffee', 'milk shake','smoothies'];
        foreach ($uncountable_bars as $uncountable_bar){
            Category::create([
                'name' => $uncountable_bar,
                'type_id' => 3,
                'is_countable' => false
            ]);
        }

        $countable_general_items = ['ဆန်အိတ်','ဆီပုံး'];
        foreach ($countable_general_items as $countable_general_item){
            Category::create([
                'name' => $countable_general_item,
                'type_id' => 4,
                'is_countable' => true
            ]);
        }

        $uncountable_general_items = ['လိမ္မော်သီး','သံပုရာသီး'];
        foreach ($uncountable_general_items as $uncountable_general_item){
            Category::create([
                'name' => $uncountable_general_item,
                'type_id' => 4,
                'is_countable' => false
            ]);
        }
    }
}
