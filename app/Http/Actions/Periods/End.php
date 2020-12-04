<?php


namespace App\Http\Actions\Periods;

use App\Models\Period;

class End
{
    private $period;
    public function __construct(){
        $this->period = Period::class;
    }

    public function byId($id){
        $period = $this->checkPeriodID($id);
        $this->updateEndTime($period);
    }

    public function byLatest($sessionID){
        $period =  $this->period::where('session_id',$sessionID)->where('end_time',null)->first();
        if($period){
            $this->updateEndTime($period);
        }
    }

    protected function updateEndTime($period){
        $period->update([
            'end_time' => CurrentTime()
        ]);
    }

    protected function checkPeriodID($id){
        $period = $this->period::where('id',$id)->first();
        if(!$period)
            return responseStatus('Requested period ID is not found',400);
        if($period->end_time != null)
            return responseStatus('Requested period ID is already finished',400);
        return $period;
    }
}
