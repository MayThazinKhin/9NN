<?php


namespace App\Http\Actions\Session;

use App\Models\PowerMood;

class CurrentStatus
{

    public function run(){
        $latest_power = PowerMood::where('end_date',null)->first();
        $power_status = ($latest_power) ? false : true ;
        $current_status = new \stdClass();
        $current_status->time = CurrentTime();
        $current_status->power = $power_status;
        return $current_status;
    }
}
