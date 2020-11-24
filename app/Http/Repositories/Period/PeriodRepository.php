<?php

namespace App\Http\Repositories\Period;

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
       $data['end_time'] = CurrentTime();
       $period = $this->checkPeriodID( $data['period_id']);
       $period->update($data);
    }

    public function getPeriodsBySessionID($sessionID){
        $periods =  $this->period::where('session_id',$sessionID)->get();
        return (new PeriodsBySessionID())->run($periods,$sessionID);
    }

    public function checkPeriodID($id){
        $period = $this->period::where('id',$id)->first();
        if(!$period)
            return responseStatus('Requested period ID is not found',400);
        if($period->end_time != null)
            return responseStatus('Requested period ID is already finished',400);
        return $period;
    }
}
