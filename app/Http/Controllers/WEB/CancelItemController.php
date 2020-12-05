<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\CancelItem;

use App\Models\KitchenItem;
use App\Models\Staff;
use Illuminate\Http\Request;

class CancelItemController extends Controller
{
    public function index(){
        $items = CancelItem::orderBy('id', 'desc')->paginate(20);
        foreach ( $items->items() as $item){
            $item->marker_name = Staff::where('id', $item->session->marker_id)->pluck('name')->first();
            unset($item['session']);
        }
        return view('cancelItems.index',compact('items'));
    }

    public function kitchenItems(){
        $items = KitchenItem::orderBy('id', 'desc')->paginate(20);
        return view('kitchenItems.index',compact('items'));
    }

    public function updateKitchenStatus(Request $request,KitchenItem $item){
        $item->update($request->all());
    }
}
