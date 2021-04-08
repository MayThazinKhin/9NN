<?php

//use in App\Http\Controllers\WEB\InvoiceController@payCredit
namespace App\Http\Actions\Account;


class CreditAdding extends Ledgering
{
    public function __construct(){
        parent::__construct();
    }

    public function run($value){
        $data = $this->setData($value,1106);
        $this->create($data);
        $this->updateCashInHand($data);
    }
}
