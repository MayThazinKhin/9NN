<?php


namespace App\Http\Actions\Account;


use App\Models\Account;
use App\Models\Ledger;

class Ledgering
{
    protected $ledger;
    public function __construct(){
        $this->ledger = [
            'date' =>now()->format('Y-m-d'),
        ];
    }

    protected function create($data){
        $ledger_data = array_merge($this->ledger,$data);
        Ledger::create($ledger_data);
    }

    protected function setData($value, $code){
        $account_id = Account::where('code',$code)->pluck('id')->first();
        return [
            'value' => $value,
            'account_id'=> $account_id
        ];
    }

    protected function setType($id,$type){
        return [
            'ledgerable_id' => $id,
            'ledgerable_type' =>$type
        ];
    }
}
