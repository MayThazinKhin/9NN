<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{

    public function run(){
            Member::create([
                'name' => 'member1',
                'phone_number' => '093939393939',
                'address' => 'address1',
                'allowance' => 100000,
                'credit' => 50000
            ]);

        Member::create([
            'name' => 'member2',
            'phone_number' => '093939393938',
            'address' => 'address1',
            'allowance' => 10000,
            'credit' => 5000
        ]);
        Member::create([
            'name' => 'member3',
            'phone_number' => '093939393937',
            'address' => 'address1',
            'allowance' => 50000,
            'credit' => 10000
        ]);
    }
}
