<?php


namespace App\Http\Actions\Account;

use App\Models\Account;
use App\Models\Ledger;
use Carbon\Carbon;

class Accounting
{
    public function primary(){
        return Account::where('code','<', 9)->where('is_archived',false)->get();
    }

    public function secondary($primary_code){
        return $this->getChildAccounts($primary_code,4);
    }

    protected function getChildAccounts($parent_account_code,$code_length){
        return Account::where('code','LIKE', $parent_account_code.'2'.'%')->whereRaw('LENGTH(code) =' . $code_length)->get();
    }

    public function getAccountValueByDate($start_date,$end_date){
        $cash_ids = $this->getCashAccountID();
        $accounts =  Account::whereRaw('LENGTH(code) =' . 4)->whereNotIn('id',$cash_ids)->select('id','name','code','value')->get();
        foreach ($accounts as $account){
            $type_id = intval(substr($account->code, 0, 1));
            $type =  Account::where('code',$type_id)->select('id','name')->first();
            $account->type = $type->name;
            $value = Ledger::where('account_id',$account->id)->whereBetween('date',[$start_date,$end_date])->sum('value');
            $account->value = $value;
        }
        return $accounts;
    }

    public function getCashAccountID(){
        return Account::where('code','LIKE', '4'.'2'.'%')->pluck('id')->all();
    }

    public function getAdvancedAccountID(){
        return Account::where('code','LIKE', '3'.'1'.'%')->pluck('id')->all();
    }

}
