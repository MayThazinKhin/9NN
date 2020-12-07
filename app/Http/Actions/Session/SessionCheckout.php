<?php


namespace App\Http\Actions\Session;


use App\Http\Services\Session\SessionFacade;

class SessionCheckout
{
    public function run($data, $session)
    {
        if ($data['paid_value'] > $data['net_value']) {
            $data['is_done'] = true;
        }
        $session->update($data);
        $session_items = SessionFacade::getOrderItems($data['session_id']);
        $items = $session_items->items;
        foreach ($items as $item) {
            if ($item->type_name != 'menu') {
                $count = $item->item_count - $item->count;
                unset($item['item_count']);
                unset($item['total']);
                unset($item['type_name']);
                unset($item['category_name']);
                $item->update([
                    'count' => $count
                ]);
            }
        }

    }
}
