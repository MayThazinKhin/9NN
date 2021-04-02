<?php


namespace App\Http\Actions\Account;

class CustomAdding extends Ledgering implements AccountValue
{
    private $data;
    public function __construct($data){
        $this->data = $data;
        parent::__construct();
    }

    public function run(){
        //$data = $this->setData($this->data->value,$this->data->code);
        $data = [
            'value' => $this->data['value'],
            'account_id'=> $this->data['title']
        ];


        $this->create($data);
    }


}
