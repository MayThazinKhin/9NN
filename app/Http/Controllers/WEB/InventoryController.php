<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\InventoryAdding;
use App\Http\Requests\InventoryRequest;
use App\Http\Services\Item\ItemFacade;
use App\Models\Inventory;
use App\Models\Item;

class InventoryController extends BasicController
{
    public function __construct(){
        $inventories = Inventory::class;
        parent::__construct($inventories, 'inventory', 'inventories');
    }

    public function index(){
        return parent::indexData();
    }

    public function create(){
        $types = ItemFacade::getAllTypes();
        return view('inventory.create',compact('types'));
    }

    public function store(InventoryRequest $request){
        $data = $request->all();
        $data['date'] = CurrentTime();
        $inventory =  Inventory::create($data);
        $this->updateItem($data);
        (new InventoryAdding($inventory))->run();
        return redirect(route('inventory.index'));
    }

    protected function updateItem($data){
        $new_price = $data['price'] / $data['count'];
        $item = Item::where('id',$data['item_id'])->first();
        $item_data['buying_price'] = ($item->buying_price == 0 )? $new_price : round(($item->buying_price + $new_price) / 2) ;
        $item_data['count'] = $item->count + $data['count'];
        $item->update($item_data);
    }
}
