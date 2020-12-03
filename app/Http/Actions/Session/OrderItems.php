<?php


namespace App\Http\Actions\Session;


use Illuminate\Support\Facades\Route;

class OrderItems
{
    public function run($session,$data){
        $route_name = Route::currentRouteName();
        foreach ($data['items'] as $item) {
            $item_id = $item['id'];
            $count = $item['count'];
            $is_already_ordered = $session->items->contains($item_id);
            if ($is_already_ordered) {
                $old_count = $session->items()->where('item_id', $item_id)->first()->pivot->count;
                $new_count = ($route_name == 'order_items')  ? $old_count + $count : $old_count - $count;
                $session->items()->where('item_id', $item_id)->updateExistingPivot($item_id, ['count' => $new_count]);
            } else {
                $session->items()->attach($item_id, ['count' => $count]);
            }
        }
    }
}
