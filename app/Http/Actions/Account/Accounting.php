<?php


namespace App\Http\Actions\Account;

use App\Models\Account;
use App\Models\Ledger;

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

    public function getAccountValue($accounts){
        $a = [];
        foreach ($accounts as $acc){
            $account = new \stdClass();
            $account->id = $acc->id;
            $account->name = $acc->name;
            $account->code = $acc->code;
            $a [] = $account;
        }
        return $a;
    }

    protected function getAccountValueByAction($account,$action){

        return Ledger::with('account')
            ->whereHas('account',function($query) use($account,$action){
                $query->where('code','LIKE', $account->code.'%')
                    ->where('action',$action);
            })->sum('value');
    }

}
