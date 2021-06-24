<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\InventoryAdding;
use App\Http\Requests\InventoryRequest;
use App\Http\Services\Item\ItemFacade;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\ItemTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $raw_types = ItemFacade::getAllTypes();
        $types = $raw_types->filter(function ($item) {
            return $item->name != 'menu';
        });
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

    public function getItemList(){
         $items = DB::table('categories')
            ->join('items', 'categories.id', '=', 'items.category_id')
            ->where('categories.is_countable',true)
            ->paginate(20);
        return view('inventory.list',compact('items'));
    }

    public function transferItems(Request $request){
        $request->date = CurrentTime();
        ItemTransfer::create($request->all());
    }




}
