<?php

namespace App\Http\Controllers\API;

use App\Http\Actions\Account\SessionAdding;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Ledger;
use App\Models\Session;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function run(){
       $start_date = Carbon::parse('2021-04-1');
       $end_date = Carbon::parse('2021-04-2');
       $accounts =  Account::whereRaw('LENGTH(code) =' . 4)->select('id','name','code','value')->get();
       foreach ($accounts as $account){
           $type_id = intval(substr($account->code, 0, 1));
           $type =  Account::where('code',$type_id)->select('id','name')->first();
           $account->type = $type->name;
           $value = Ledger::where('account_id',$account->id)->whereBetween('date',[$start_date,$end_date])->sum('value');
           $account->value = $value;
       }
       return $accounts;
    }
}
