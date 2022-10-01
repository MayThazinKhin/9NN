<?php

//use in App\Http\Controllers\WEB\ReceiptController@update
namespace App\Http\Actions\Account;

class ReceiptAdding extends Ledgering implements AccountValue
{
    private $receiptId;
    private $receipt;
    public function __construct($receipt){
        parent::__construct();
        dd($receipt);
        $this->receiptId = $receipt->id;
        $this->receipt = $receipt;
        $type = $this->setType($this->receiptId,'receipt');
        $this->ledger = array_merge($this->ledger,$type);
    }

    public function run(){
         $this->addShowroomValue();
         $this->addTaxValue();
    }

    protected function addShowroomValue(){
        $shop_value = $this->receipt->total;
        $data = $this->setData($shop_value,1104);
        $this->create($data);
        $this->updateCashInHand($data);
    }

    protected function addTaxValue(){
        if($this->receipt->is_tax == false){
            $data = $this->setData($this->receipt->tax,1105);
            $this->create($data);
            $this->updateCashInHand($data);
        }
    }
}
