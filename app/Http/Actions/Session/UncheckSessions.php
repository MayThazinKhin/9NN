<?php


namespace App\Http\Actions\Session;

use App\Models\Session;

class UncheckSessions
{
    public function run(){
        $sessions =  Session::where('end_time',null)->orderBy('id', 'desc')->get();
        foreach ($sessions as $session){
            $session->table_name = $session->table->name;
            $session->marker_name = $session->marker->name;
            unset($session['table']);
            unset($session['marker']);
        }
        return $sessions;
    }
}
