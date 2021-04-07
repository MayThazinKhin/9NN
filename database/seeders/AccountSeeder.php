<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run()
    {
        Account::create([
            'name' => 'income',
            'code' => 1,
            'is_categorized'=> true
        ]);
        Account::create([
            'name' => 'table',
            'code' => 1101,
        ]);
        Account::create([
            'name' => 'marker',
            'code' => 1102
        ]);
        Account::create([
            'name' => 'food',
            'code' => 1103
        ]);
        Account::create([
            'name' => 'Showroom မှ ရငွေ',
            'code' => 1104
        ]);
        Account::create([
            'name' => 'tax',
            'code' => 1105
        ]);
        Account::create([
            'name' => 'အကြွေး',
            'code' => 1106
        ]);
        Account::create([
            'name' => 'marker_paid',
            'code' => 1107
        ]);

        Account::create([
            'name' => 'Third party မှ ထုတ်ပေးငွေ',
            'code' => 1201
        ]);
        Account::create([
            'name' => 'ဗူးခွံ ရောင်းရငွေ',
            'code' => 1202
        ]);
        Account::create([
            'name' => 'ကျူခုံ ရောင်းရငွေ',
            'code' => 1203
        ]);
        Account::create([
            'name' => 'ကွမ်းယာ ဆိုင်မှ လစာ',
            'code' => 1204
        ]);
        Account::create([
            'name' => 'အခြားဝင်ငွေ',
            'code' => 1205
        ]);

        Account::create([
            'name' => 'expense',
            'code' => 2,
            'is_categorized'=> true
        ]);

        Account::create([
            'name' => 'BAR',
            'code' => 2101
        ]);

        Account::create([
            'name' => 'အထွေထွေ',
            'code' => 2201
        ]);
        Account::create([
            'name' => 'လုပ်ငန်းသုံး',
            'code' => 2202
        ]);
        Account::create([
            'name' => 'စာရေးကိရိယာ',
            'code' => 2203
        ]);
        Account::create([
            'name' => 'လိုငွေ',
            'code' => 2204
        ]);
        Account::create([
            'name' => 'ကြိုထုတ်ငွေ',
            'code' => 2205
        ]);
        Account::create([
            'name' => 'လစာ',
            'code' => 2206
        ]);
        Account::create([
            'name' => 'ဆေးကုသစာရိတ်',
            'code' => 2207
        ]);
        Account::create([
            'name' => 'မီတာခ',
            'code' => 2208
        ]);
        Account::create([
            'name' => 'လက်ရွေးစင် ထောက်ပံစားရိတ်',
            'code' => 2209
        ]);
        Account::create([
            'name' => 'အခွန် တံဆိပ်',
            'code' => 2210
        ]);
        Account::create([
            'name' => 'အပ်ငွေ',
            'code' => 2211
        ]);
        Account::create([
            'name' => 'advance',
            'code' => 3,
            'is_archived'=> true
        ]);
        Account::create([
            'name' => 'total',
            'code' => 3101
        ]);

        Account::create([
            'name' => 'cash',
            'code' => 4,
            'is_archived'=> true
        ]);
        Account::create([
            'name' => 'cash in hand',
            'code' => 4201
        ]);
        Account::create([
            'name' => 'cash in bank',
            'code' => 4202
        ]);


    }
}
