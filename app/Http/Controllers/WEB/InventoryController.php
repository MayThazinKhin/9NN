<?php

namespace App\Http\Controllers\WEB;

use App\Http\Requests\InventoryRequest;
use App\Http\Services\Item\ItemFacade;
use App\Models\Inventory;

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
        $data['date'] = today();
        Inventory::create($data);
        return redirect(route('inventory.index'));
    }
}
