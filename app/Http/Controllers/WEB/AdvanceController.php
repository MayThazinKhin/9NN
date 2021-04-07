<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\Accounting;
use App\Http\Controllers\Controller;
use App\Models\Ledger;
use App\Models\Staff;

class AdvanceController extends Controller
{
    public function index(){
        $advanced_accounts = $this->getAdvancedAccounts();
        $ledgers = Ledger::whereIn('account_id',$advanced_accounts)->orderBy('date', 'desc')->get();
        $staffs = Staff::all();
        return view('advanced.index',compact('ledgers','staffs'));
    }

    protected function getAdvancedAccounts(){
        return (new Accounting())->getAdvancedAccountID();
    }


}
