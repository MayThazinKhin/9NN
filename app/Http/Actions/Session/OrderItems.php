<?php


namespace App\Http\Actions\Session;

use App\Models\CancelItem;
use App\Models\KitchenItem;
use Illuminate\Support\Facades\Route;

class OrderItems
{
    public function run($session,$data){
        foreach ($data['items'] as $item) {
            $item_id = $item['id'];
            $count = $item['count'];
            $input = [
                'item_id'=>$item_id,
                'session_id'=>$session->id,
                'count' => $count,
            ];
            $route_name = Route::currentRouteName();
            if($route_name == 'order_items'){
                $is_already_ordered = $session->items->contains($item_id);
                ($is_already_ordered)  ?
                    $this->updateSessionItemCount($session,$item_id,$count,'order') :
                    $session->items()->attach($item_id, ['count' => $count]);
                KitchenItem::create($input);
            }
            elseif ($route_name == 'foc_order_items'){
                $is_already_foc = $session->foc_items->contains($item_id);
                if ($is_already_foc) {
                    $foc_old_count = $session->foc_items()->where('item_id', $item_id)->first()->pivot->count;
                    $foc_new_count = $foc_old_count + $count;
                    $session->foc_items()->where('item_id', $item_id)->updateExistingPivot($item_id, ['count' => $foc_new_count]);
                }
                else{
                    $session->foc_items()->attach($item_id, ['count' => $count]);
                }
                $this->updateSessionItemCount($session,$item_id,$count,'foc');
            }
            else {
                $this->updateSessionItemCount($session,$item_id,$count,'cancel');
                CancelItem::create($input);
            }
        }
    }

    public function updateSessionItemCount($session, $item_id, $count, $type){
        $old_count = $session->items()->where('item_id', $item_id)->first()->pivot->count;
        $new_count =  ($type == 'order')?  $old_count + $count : $old_count - $count ;
        $session->items()->where('item_id', $item_id)->updateExistingPivot($item_id, ['count' => $new_count]);
    }
}
