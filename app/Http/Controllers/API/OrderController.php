<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SellItemRequest;
use App\Models\Item;
use App\Models\Receipt;

class OrderController extends Controller
{
    public function orderItems(SellItemRequest $request){
        $input_items = stripslashes($request->items);
        $order = json_decode( $input_items, true );
        if($order == null){
            return  responseStatus('input data is not corrected',402);
        }
        $marker = UserData();
        $receipt = Receipt::create([
            'marker_id' => $marker->id,
            'total' => $order['total']
        ]);
        foreach ($order['items'] as $item){
            $order_count = $item['count'];
            $id = $item['id'];
            $item_data = Item::find($id);
            if($item_data){
                $receipt->items()->attach($item['id'],['count'=>$order_count]);
                $update_count = $item_data->count - $order_count ;
                $item_data->update([
                    'count' => $update_count
                ]);
            }
        }
        return responseStatus('Order Successfully',200);
    }

    public function sampleData()
    {
        $d = [];
        for($i = 1;$i<6; $i++){
            $a = new \stdClass();
            $a->id = $i;
            $a->count = $i+2;
            $d[]  = $a ;
        }
       $data = new \stdClass();
        $data->items = $d;
        $data->total = 100000.00;
        $data->type = 'shop' ;
        return $data;
    }

}
