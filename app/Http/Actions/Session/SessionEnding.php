<?php


namespace App\Http\Actions\Session;


use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Period\PeriodFacade as Period;
use App\Http\Services\Session\SessionFacade;
use App\Http\Services\Table\TableFacade as Table;

class SessionEnding
{
    public function run($session){
        Period::endLatestPeriod($session->id);
        $this->updateSession($session);
        Table::freeTable($session->table);
    }

    protected function calculateMarkerFee($sessionID){
        $sessionPeriods =  PeriodFacade::getPeriodsBySessionID($sessionID);
        $marker = SessionFacade::getMarker($sessionID);
        return $sessionPeriods->total_min * $marker->fee;
    }
    protected function updateSession($session){
        $session->update(
            [
                'end_time' => CurrentTime(),
                'marker_fee' => $this->calculateMarkerFee($session->id)
            ]);
    }
}
