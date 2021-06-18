<?php

namespace App\Http\Repositories\Period;

use App\Http\Actions\Periods\End;
use App\Http\Actions\Periods\PeriodsBySessionID;
use App\Http\Actions\Session\CurrentStatus;
use App\Http\Services\Session\SessionFacade as Session;
use App\Models\Period;
use App\Models\PowerMood;

class PeriodRepository implements PeriodInterface
{
    private $period;
    public function __construct(){
        $this->period = Period::class;
    }

    public function start($data){
        Session::checkSessionID($data['session_id']);
        $current_status = (new CurrentStatus())->run();
        $data['start_time'] = $current_status->time;
        $data['power_type'] = $current_status->power;
        $this->period::create($data);
    }

    public function end($data){
        (new End())->byId($data['period_id']);
    }


    public function getPeriodsBySessionID($sessionID){
        return (new PeriodsBySessionID())->run($sessionID);
    }

    public function endLatestPeriod($sessionID){
        (new End())->byLatest($sessionID);
    }


}
