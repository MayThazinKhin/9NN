<?php


namespace App\Http\Actions\Session;

use App\Models\Session;

class SessionCredits
{
    public function run(){
        $sessions =  Session::where('is_done',false)
            ->where('end_time','<>',null)
            ->where('member_id','<>',null)
            ->orderBy('id', 'desc')->get();
        foreach ($sessions as $session){
            $session->member_name = $session->member->name;
            unset($session['member']);
        }
        return $sessions;
    }
}
