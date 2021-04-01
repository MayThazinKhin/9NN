<?php


namespace App\Http\Actions\Account;

use App\Models\Receipt;

class ReceiptAdding extends Ledgering
{
    private $receiptId;
    private $receipt;
    public function __construct($receiptID){
        parent::__construct();
        $this->receiptId = $receiptID;
        $this->receipt = Receipt::where('id',$this->receiptId)->first();
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
    }

    protected function addTaxValue(){
        if($this->receipt->is_tax == false){
            $data = $this->setData($this->receipt->tax,1105);
            $this->create($data);
        }
    }





}
