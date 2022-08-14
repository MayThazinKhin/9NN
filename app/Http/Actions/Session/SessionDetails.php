<?php


namespace App\Http\Actions\Session;

use Carbon\Carbon;

class SessionDetails
{
    public function run($session){
        $details = new \stdClass();
        $table = $session->table;
        $details->session_id = $session->id;
        $details->start_time = $session->start_time;
        $details->end_time = $session->end_time;
        $details->table_price = $table->price;
        $details->power_off_price = $table->power_off_price;
        $details->table_name = $table->name;
        $details->date = (Carbon::parse($session->created_at))->format('d-m-Y h:s A');
        $details->invoice_number = $session->invoice_number;
        $details->marker_name = $session->marker->name;
        return $details;
    }
}
