<?php

//use in App\Http\Controllers\WEB\AccountController@create
namespace App\Http\Actions\Account;

use App\Models\Account;

class CustomAdding extends Ledgering implements AccountValue
{
    private $data;
    public function __construct($data){
        $this->data = $data;
        if(isset($this->data['staff_id'])) {
            $type = $this->setType($this->data['staff_id'],'staff');
            $this->ledger = array_merge($this->ledger,$type);
        }
        parent::__construct();
    }

    public function run(){
        $code = Account::where('id',$this->data['title'])->pluck('code')->first();
        $data = $this->setData($this->data['value'],$code);
        $this->create($data);
    }


}
