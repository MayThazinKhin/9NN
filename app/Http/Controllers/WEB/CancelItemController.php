<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\CancelItem;
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

    public function index(){
        $items = CancelItem::orderBy('id', 'desc')->paginate(20);
        foreach ( $items->items() as $item){
            $item->marker_name = Staff::where('id', $item->session->marker_id)->pluck('name')->first();
            unset($item['session']);
        }
        return view('cancelItems.index',compact('items'));
    }


    public function kitchenItems(Request  $request){
        $kitchen_items = KitchenItem::orderBy('id', 'desc')->get();
        $filtered_items = collect($kitchen_items)->where('item_type',$this->type)->values();
        $items = paginate($filtered_items,$request);
        return view('kitchenItems.index',compact('items'));
    }

    public function updateKitchenStatus(Request $request,KitchenItem $item){
        $item->update($request->all());
        return redirect()->back();
    }
}
