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
                $item->item_count = $item->count;
                $item->count = $item->pivot->count;
                $item->total = $item->count * $item->price;
                $item->type_name = $item->type->name;
                unset($item['buying_price']);
                unset($item['pivot']);
                unset($item['category']);
                unset($item['type']);
                $net_total += $item->total;
            }
            $orders->items = $items;
            $orders->net_total = $net_total;
        }
        return $orders;
    }
}
