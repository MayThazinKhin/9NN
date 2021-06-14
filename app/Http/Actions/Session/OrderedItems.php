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
            $session_foc_items = $session->foc_items;
            $foc_items  = [];
            foreach ($session_foc_items as $session_foc_item){
                $foc_item = new \stdClass();
                $foc_item->id = $session_foc_item->id;
                $foc_item->name = $session_foc_item->name ;
                $foc_item->count = $session_foc_item->pivot->count;
                $foc_items [] = $foc_item;
            }
            $orders->items = $items;
            $orders->foc_items = $foc_items ;
            $orders->net_total = $net_total;
        }
        return $orders;
    }
}
