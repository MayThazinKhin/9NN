<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\Accounting;
use App\Http\Controllers\Controller;
use App\Models\Ledger;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function index(){
        $accounts = $this->getCashAccounts();
        return view('cash.index',compact('accounts'));
    }

    public function transfer(Request $request){

    }


    public function withdraw(){
        $cash_ids = (new Accounting())->getCashAccountID();
        $ledgers = Ledger::whereIn('account_id',$cash_ids)->orderBy('date', 'desc')->paginate(20);
        return view('cash.withdraw',compact('ledgers'));
    }

    protected function getCashAccounts(){
        return  (new Accounting())->secondary(4);
    }
}
