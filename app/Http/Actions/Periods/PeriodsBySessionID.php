<?php


namespace App\Http\Actions\Periods;


use App\Http\Services\Session\SessionFacade;
use Carbon\Carbon;

class PeriodsBySessionID
{
    public function run($periods,$sessionID){
        $session  = SessionFacade::getSessionDetails($sessionID);
        $total_value = 0 ;
        foreach ($periods as $period){
            if($period->end_time){
                $end_time =   Carbon::parse($period->end_time);
                $start_time = Carbon::parse($period->start_time);
                $period->total_min = $start_time->diffInMinutes($end_time);
                $period->value = $period->total_min * $session->table_price;
                $total_value += $period->value;
            }
            unset($period['session_id']);
        }
        $p = new \stdClass();
        $p->items = $periods;
        $p->total_value = $total_value;
        return $p;
    }
}
