<?php

namespace App\Http\Controllers\API;

use App\Http\Actions\Account\Accounting;
use App\Http\Controllers\Controller;
use App\Models\Ledger;

class AccountController extends Controller
{
    public function run(){
        $cash_ids = (new Accounting())->getCashAccountID();
        $ledgers = Ledger::whereIn('account_id',$cash_ids)->orderBy('date', 'desc')->paginate(20);
        return $ledgers;
    }
}
