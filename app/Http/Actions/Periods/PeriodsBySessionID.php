<?php


namespace App\Http\Actions\Periods;

use App\Http\Services\Session\SessionFacade;
use App\Models\Period;
use Carbon\Carbon;
class PeriodsBySessionID
{
    public function run($sessionID){
        $periods =  Period::where('session_id',$sessionID)->get();
        $session  = SessionFacade::getSessionDetails($sessionID);
        $total_value = 0 ;
        $final_min = 0;
        foreach ($periods as $period){
            if($period->end_time){
                $end_time  =   Carbon::parse($period->end_time);
                $start_time = Carbon::parse($period->start_time);
                $period->total_min = $start_time->diffInMinutes($end_time);
                $table_price = ($period->power_type == 0) ? $session->power_off_price :  $session->table_price;
                $period->value = $period->total_min * $table_price ;
                $total_value += $period->value;
                $final_min += $period->total_min;
            }
            unset($period['session_id']);
        }
        $p = new \stdClass();
        $p->items = $periods;
        $p->total_value = $total_value;
        $p->total_min = $final_min;
        return $p;
    }
}
