<?php

//use in App\Http\Controllers\WEB\InventoryController@store
namespace App\Http\Actions\Account;

class InventoryAdding extends Ledgering implements AccountValue
{
    private $inventory;
    private $inventoryId;
    public function __construct($inventory){
        parent::__construct();
        $this->inventoryId = $inventory->id;
        $this->inventory = $inventory;
        $type = $this->setType($this->inventoryId,'inventory');
        $this->ledger = array_merge($this->ledger,$type);
    }

    public function run(){
        $this->addBarValue();
    }

    protected function addBarValue(){
        $inventory_value = $this->inventory->price;
        $data = $this->setData($inventory_value,2101);
        $this->create($data);
        $this->updateCashInHand($data);
    }
}
