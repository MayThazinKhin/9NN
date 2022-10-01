<?php

//use in App\Http\Controllers\WEB\AccountController@create
namespace App\Http\Actions\Account;

use App\Models\Account;

class CustomAdding extends Ledgering implements AccountValue
{
    private $data;
    private $code;

    public function __construct($data){
        parent::__construct();
        $this->data = $data;
        $type = $this->data['type'];
        $this->data['type_id'] = $type;
        if($type == 33){
            $this->data['is_confirmed'] = false;
        }
        $this->code = Account::where('id',$this->data['title'])->pluck('code')->first();
        if(isset($this->data['staff_id'])) {
            $type = $this->setType($this->data['staff_id'],'staff');
            $this->ledger = array_merge($this->ledger,$type);
            $this->code =  $this->data['title'];
        }
    }

    public function run(){
        $data = $this->setData($this->data['value'],$this->code);
        $this->data['account_id'] = $data['account_id'];
        $this->create($this->data);
        ($this->code < 4000) ? $this->updateCashInHand($data) : $this->transfer();
    }

    public function transfer(){
        $bank_value = 0;
        $hand_value = 0;
        $cash_in_bank = Account::where('code',4202)->first();
        $cash_in_hand = Account::where('code',4201)->first();
        $sub_cash = Account::where('code',4203)->first();

        //cashInHand To cashInBank
        if($this->code == 4201 ){
            $hand_value =  $cash_in_hand->value - $this->data['value'] ;
            $bank_value =  $cash_in_bank->value + $this->data['value'];
        }
        //cashInBank To cashInHand
        if($this->code == 4202 ){
            $hand_value =  $cash_in_hand->value + $this->data['value'] ;
            $bank_value =  $cash_in_bank->value - $this->data['value'];
        }


        $cash_in_bank->update([
            'value' => $bank_value
        ]);
        $cash_in_hand->update([
            'value' =>  $hand_value
        ]);
    }

}
