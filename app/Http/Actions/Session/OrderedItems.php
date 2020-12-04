<?php


namespace App\Http\Actions\Session;

class OrderedItems
{
    public function run($session){
        $orders = new \stdClass();
        if ($session) {
            $items = $session->items;
            $net_total = 0;
            foreach ($items as $item) {
                $item->count = $item->pivot->count;
                $item->total = $item->count * $item->price;
                unset($item['category_id']);
                unset($item['pivot']);
                $net_total += $item->total;
            }
            $orders->items = $items;
            $orders->net_total = $net_total;
        }
        return $orders;
    }
}
