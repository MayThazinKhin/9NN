<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\CancelItem;
use App\Models\Item;
use App\Models\ItemInventory;
use App\Models\KitchenItem;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CancelItemController extends Controller
{
    protected $type;
    public function __construct(){
        $this->middleware(function ($request, $next) {
            $role = Auth::user()->role;
            $this->type = ($role == 'kitchen_staff') ? 'menu' : 'bar';
            return $next($request);
        });
    }

    public function index(Request $request){
        $cancel_items = CancelItem::orderBy('id', 'desc')->get();
        $items = collect($cancel_items)->where('item_type',$this->type)->values();
        foreach ( $items as $item){
            $item->marker_name = Staff::where('id', $item->session->marker_id)->pluck('name')->first();
            unset($item['session']);
        }
        //$items = paginate($filtered_items,$request);
        return view('cancelItems.index',compact('items'));
    }


    public function kitchenItems(Request  $request){
        $kitchen_items = KitchenItem::orderBy('id', 'desc')->get();
        $filtered_items = collect($kitchen_items)->where('item_type',$this->type)->values();
        $items = paginate($filtered_items,$request);
        return view('kitchenItems.index',compact('items'));
    }

    public function updateKitchenStatus(Request $request,KitchenItem $kitchenItem){
        $kitchenItem->update($request->all());
        if($request->status == 'done'){
            $is_countable =  $kitchenItem->kitchenItem->Category->is_countable;
            if($is_countable){
                $item_data = ItemInventory::where([['item_id',$kitchenItem->item_id],['type_id',3]])->first();
                if($item_data){
                    $update_count = $item_data->count - $kitchenItem->count ;
                    $item_data->update([
                        'count' => $update_count
                    ]);
                }
            }
        }
        return redirect()->back();
    }
}
