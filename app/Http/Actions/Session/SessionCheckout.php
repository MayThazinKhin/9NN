<?php


namespace App\Http\Actions\Session;


use App\Http\Services\Session\SessionFacade;
use App\Models\Member;
use App\Models\Receipt;
use App\Models\Session;

class SessionCheckout
{
    public function run($data, $session)
    {
        if ($data['paid_value'] >= $data['net_value']) {
            $data['is_done'] = true;
        }
        $session->update($data);
        $member_id = $data['member_id'];
        if($member_id){
            $member = Member::where('id',$member_id)->first();
            $session_credit = SessionFacade::sessionCredits($member_id);
            $receipt_credit = Receipt::where('member_id',$member_id)->where('is_done',false)->sum('credit');
            $member->credit = $session_credit + $receipt_credit ;
            $member->update();
        }
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
