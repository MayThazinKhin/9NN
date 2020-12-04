<?php

namespace App\Http\Repositories\Period;

use App\Http\Actions\Periods\End;
use App\Http\Actions\Periods\PeriodsBySessionID;
use App\Http\Services\Session\SessionFacade as Session;
use App\Models\Period;

class PeriodRepository implements PeriodInterface
{
    private $period;
    public function __construct(){
        $this->period = Period::class;
    }

    public function start($data){
        Session::checkSessionID($data['session_id']);
        $data['start_time'] = CurrentTime();
        $this->period::create($data);
    }

    public function end($data){
        (new End())->byId($data['period_id']);
    }

    public function getPeriodsBySessionID($sessionID){
        $periods =  $this->period::where('session_id',$sessionID)->get();
        return (new PeriodsBySessionID())->run($periods,$sessionID);
    }

    public function endLatestPeriod($sessionID){
        (new End())->byLatest($sessionID);
    }
}
