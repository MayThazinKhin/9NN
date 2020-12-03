<?php

namespace App\Http\Controllers\WEB;

use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;
use App\Models\Role;
use App\Models\Secondary;
use App\Models\Type;
use Illuminate\Http\Request;

class InventoryController extends BasicController
{
    public function __construct(){
        $inventories = Inventory::class;
        parent::__construct($inventories, 'inventory', 'inventories');
    }

    public function index()
    {
        return parent::indexData();
    }

    public function create(){
        $types = Type::all();

        return view('inventory.create',compact('types'));
    }

    public function store(InventoryRequest $request){
        $data = $request->all();
        $data['date'] = today();
        Inventory::create($data);
        return redirect(route('inventory.index'));

    }


}
