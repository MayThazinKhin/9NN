<?php


namespace App\Http\Actions\Session;

class SessionDetails
{
    public function run($session){
        $details = new \stdClass();
        $table = $session->table;
        $details->session_id = $session->id;
        $details->start_time = $session->start_time;
        $details->end_time = $session->end_time;
        $details->table_price = $table->price;
        $details->table_name = $table->name;
        return $details;
    }
}
