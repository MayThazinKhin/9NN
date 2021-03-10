<?php


namespace App\Http\Actions\Session;


use App\Http\Services\Session\SessionFacade;
use App\Models\Member;

class SessionCheckout
{
    public function run($data, $session)
    {
        if ($data['paid_value'] >= $data['net_value']) {
            $data['is_done'] = true;
        }
        if($data['member_id']){
            $member = Member::where('id',$data['member_id'])->first();
            if($session->credit > $data['credit']) {
                $credit = $session->credit - $data['credit'];
                $member->credit -= $credit;
            }
            if($data['credit'] > 0 ){
                $credit += $data['credit'];

            }

            $member->update();
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
