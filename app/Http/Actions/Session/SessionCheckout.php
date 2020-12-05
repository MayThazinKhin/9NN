<?php


namespace App\Http\Actions\Session;


class SessionCheckout
{
    public function run($data, $session){
        $session->update([
            'total'=>$data->total,
            'credit' => $data->credit,
            'paid_value' => $data->paid_value,
            'discount' => $data->discount,
            'is_tax' => $data->is_tax,
            'cashier_id' =>  $data->cashier_id,
            'member_id' => $data->member
        ]);
    }
}
