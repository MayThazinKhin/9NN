<?php

namespace App\Http\Controllers\API;


use App\Http\Actions\Account\Accounting;
use App\Http\Actions\Account\CustomAdding;
use App\Http\Actions\Account\ReceiptAdding;
use App\Http\Actions\Account\SessionAdding;
use App\Http\Controllers\Controller;
use App\Models\Ledger;


class AccountController extends Controller
{

    public function run(){
        $data = Ledger::orderBy('date', 'desc')->paginate(20);
        return $data;
    }
}
