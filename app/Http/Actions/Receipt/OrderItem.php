<?php


namespace App\Http\Actions\Receipt;


use App\Models\Item;
use App\Models\Receipt;

class OrderItem
{
    public function run($request){
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
        return $receipt;
    }

}
