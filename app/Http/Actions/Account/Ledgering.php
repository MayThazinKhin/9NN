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
        $sign = $this->getSign($code);
        return [
            'value' => $value,
            'account_id'=> $account_id,
            'sign' => $sign
        ];
    }

    protected function setType($id,$type){
        return [
            'ledgerable_id' => $id,
            'ledgerable_type' =>$type
        ];
    }

    protected function getSign($code){
        $income = [1];
        $expense = [2,3];
        $cash = [4];
        $type = FirstWord($code) ;
        if($type < 4){
            return  (in_array($type,$income)) ? true : false ;
        }
       return 'cash';
    }

    protected function updateCashInHand($data){
            $cash_in_hand = Account::where('code',4201)->first();
            $value = $data['sign'] ? $cash_in_hand->value + $data['value'] : $cash_in_hand->value  - $data['value'] ;
            $cash_in_hand->update(
                [
                    'value' => $value
                ]
            );
    }




}
