<?php

namespace App\Http\Controllers\WEB;

use App\Models\Inventory;
use App\Models\Secondary;
use Illuminate\Http\Request;

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
        return view('inventory.create');
    }

    public function store(Request $request){
        $a ['count'] = 1;
        $a ['price'] = 200 ;
        $a ['item_id'] = 1;
        $a ['date'] = '2020-11-26 05:16:29';
     return   Inventory::create($a);

    }


}
