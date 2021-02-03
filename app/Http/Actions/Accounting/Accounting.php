<?php


namespace App\Http\Actions\Accounting;

use App\Models\Account;
use App\Models\Ledger;

class Accounting
{
    public function primary(){
        $primary_accounts = Account::where('code','<', 9)->get();
//        dd($this->getAccountValue($primary_accounts));
        return $this->getAccountValue($primary_accounts);
    }

    public function secondary($primary_code){
        return $this->getChildAccounts($primary_code,2);
    }

    public function tertiary($secondary_code){
        return $this->getChildAccounts($secondary_code,3);
    }

    public function quaternary($tertiary_code){
        return $this->getChildAccounts($tertiary_code,4);
    }

    public function fifth($quaternary_code){
        return $this->getChildAccounts($quaternary_code,5);
    }

    protected function getChildAccounts($parent_account_code,$code_length){
        $accounts =  Account::where('code','LIKE', $parent_account_code.'%')->whereRaw('LENGTH(code) =' . $code_length)->get();
        return $this->getAccountValue($accounts);
    }
    public function getAccountValue($accounts){
        $a = [];
        foreach ($accounts as $acc){
            $account = new \stdClass();
            $account->id = $acc->id;
            $account->name = $acc->name;
            $account->code = $acc->code;
            $account->credit =  $this->getAccountValueByAction($acc,'credit');
            $account->debit =  $this->getAccountValueByAction($acc,'debit');
            $a [] = $account;
        }
        return $a;
    }

    protected function getAccountValueByAction($account,$action){

        return Ledger::with('account')
            ->where('is_confirmed',true)
//            ->where('branch_id',authStaff()->branch->id)
            ->whereHas('account',function($query) use($account,$action){
                $query->where('code','LIKE', $account->code.'%')
                    ->where('action',$action);
            })->sum('value');
    }

}
