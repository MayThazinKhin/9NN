<?php


namespace App\Http\Actions\Session;


class SessionCheckout
{
    public function run($data, $session){
       if($data['paid_value'] > $data['net_value']){
           $data['is_done'] = true;
       }
        $session->update($data);
    }
}
