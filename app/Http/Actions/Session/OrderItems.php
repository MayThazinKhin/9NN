<?php


namespace App\Http\Actions\Session;


use App\Models\CancelItem;
use Illuminate\Support\Facades\Route;

class OrderItems
{
    public function run($session,$data){
        foreach ($data['items'] as $item) {
            $item_id = $item['id'];
            $count = $item['count'];
            $is_already_ordered = $session->items->contains($item_id);
            if ($is_already_ordered) {
                $this->updateOrder($session, $item_id , $count);
            } else {
                $session->items()->attach($item_id, ['count' => $count]);
            }
        }
    }

    protected function updateOrder($session, $item_id, $count){
        $route_name = Route::currentRouteName();
        $old_count = $session->items()->where('item_id', $item_id)->first()->pivot->count;
        if($route_name == 'order_items'){
            $new_count =  $old_count + $count;
        }
        else{
            $new_count =   $old_count - $count;
            CancelItem::create([
                'item_id'=>$item_id,
                'session_id'=>$session->id,
                'count' => $count
            ]);
        }
        $session->items()->where('item_id', $item_id)->updateExistingPivot($item_id, ['count' => $new_count]);
    }
}
