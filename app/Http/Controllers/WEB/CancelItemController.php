<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\CancelItem;

use App\Models\Staff;

class CancelItemController extends Controller
{
    public function index(){
        $items = CancelItem::orderBy('id', 'desc')->paginate(20);
        foreach ( $items->items() as $item){
            $item->marker_name = Staff::where('id', $item->session->marker_id)->pluck('name')->first();
            $item->aa= $item->sessionMarker;
            unset($item['session']);
        }
        return view('cancelItems.index',compact('items'));
    }
}
