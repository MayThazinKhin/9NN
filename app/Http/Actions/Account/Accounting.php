<?php


namespace App\Http\Actions\Account;

use App\Models\Account;
use App\Models\Ledger;
use Carbon\Carbon;

class Accounting
{
    public function primary(){
        $primary_accounts = Account::where('code','<', 9)->get();
        return $primary_accounts;
    }

    public function secondary($primary_code){
        return $this->getChildAccounts($primary_code,4);
    }

    protected function getChildAccounts($parent_account_code,$code_length){
        return Account::where('code','LIKE', $parent_account_code.'2'.'%')->whereRaw('LENGTH(code) =' . $code_length)->get();
    }


    public function getAccountValueByDate($start_date,$end_date){
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
