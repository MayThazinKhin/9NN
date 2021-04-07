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
        $this->code = Account::where('id',$this->data['title'])->pluck('code')->first();
        if(isset($this->data['staff_id'])) {
            $type = $this->setType($this->data['staff_id'],'staff');
            $this->ledger = array_merge($this->ledger,$type);
            $this->code =  $this->data['title'];
        }
    }

    public function run(){
        $data = $this->setData($this->data['value'],$this->code);
        $this->create($data);
    }
}
