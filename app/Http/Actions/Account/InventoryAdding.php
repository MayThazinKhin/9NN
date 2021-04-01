<?php


namespace App\Http\Actions\Account;


use App\Models\Inventory;

class InventoryAdding extends Ledgering
{
    private $inventory;
    private $inventoryId;
    public function __construct($inventoryID){
        $this->inventoryId = $inventoryID;
        parent::__construct();
        $this->inventory = Inventory::where('id',$this->inventoryId)->first();
        $type = $this->setType($inventoryID,'inventory');
        $this->ledger = array_merge($this->ledger,$type);
    }

    public function run(){
        $this->addBarValue();
    }

    protected function addBarValue(){
        $inventory_value = $this->inventory->price;
        $data = $this->setData($inventory_value,2101);
        $this->create($data);
    }
}
