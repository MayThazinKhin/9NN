<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemInventory;
use App\Models\ItemTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryTransferController extends Controller
{
    protected $type;
    public function __construct(){
        $this->middleware(function ($request, $next) {
            $role = Auth::user()->role;
            $this->type = ($role == 'kitchen_staff') ? 1 : 3;
            return $next($request);
        });
    }
    public function getItemList(){
        return view('bar_inventory.list');
    }

    public function getTransferItem(){
        $items =  ItemTransfer::where([['is_confirmed',0],['type_id',$this->type]])->orderBy('date','desc')->get();
        return view('bar_inventory.transfer',compact('items'));
    }

    public function confirmItems(ItemTransfer $itemTransfer){
        $itemTransfer->update([
            'is_confirmed'=> 1
        ]);
        $item_inventory = ItemInventory::firstOrNew(
            [
                'item_id'=>$itemTransfer->item_id,
                'type_id'=>$itemTransfer->type_id
            ],
            [
                'count'=>$itemTransfer->count
            ]
        );
        if($item_inventory->exists){
            $item_inventory->count += $itemTransfer->count;
        }
        $item_inventory->save();
        return redirect()->back();
    }
}
