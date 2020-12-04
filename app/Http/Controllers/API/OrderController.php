<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SellItemRequest;
use App\Models\Item;
use App\Models\Receipt;

class OrderController extends Controller
{
    public function orderItems(SellItemRequest $request){
       $order = JsonDecode($request->items);
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
                $receipt->items()->attach($id,['count'=>$order_count]);
                $update_count = $item_data->count - $order_count ;
                $item_data->update([
                    'count' => $update_count
                ]);
            }
        }
        responseStatus('Order Successfully',200);
    }

    public function sampleData()
    {
        $d = [];
        $c = [];
        for($i = 1;$i<4; $i++){
            $a = new \stdClass();
            $a->id = $i;
            $a->count = $i+2;
            $d[]  = $a ;
        }
//        for($n = 1;$n<3; $n++){
//            $b = new \stdClass();
//            $b->start_time = '2020-10-29 06:43:21';
//            $b->end_time = '2020-10-29 07:43:21';
//            $b->total = 1000 * $n;
//            $c[]  = $b ;
//        }
//        $items = new \stdClass();
//        $items->values = $d;
//        $items->total = 10000.00;
//        $periods = new \stdClass();
//        $periods->values = $c;
//        $periods->total = 20000.00;

        $data = new \stdClass();
        $data->session_id = 4;
        $data->items = $d;
//        $data->periods = $periods;
//        $data->total = 30000.00;
        //$data->type = 'shop' ;
        return $data;
    }

}
