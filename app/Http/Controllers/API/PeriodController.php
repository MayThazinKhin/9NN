<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RestartPeriodRequest;
use App\Http\Requests\API\StartPeriodRequest;
use App\Http\Services\Period\PeriodFacade;
use App\Models\PowerMood;

class PeriodController extends Controller
{
    public function startPeriod(StartPeriodRequest $request){
        $data = $request->all();
        $latest_power = PowerMood::where('end_date',null)->where('start_date',CurrentTime())->first();
        return $latest_power;
        PeriodFacade::start($data);
        $this->getAllPeriods($data);
    }

    public function restartPeriod(RestartPeriodRequest $request){
        $data = $request->all();
        PeriodFacade::end($data);
        PeriodFacade::start($data);
        $this->getAllPeriods($data);
    }

    public function endPeriod(RestartPeriodRequest $request){
        $data = $request->all();
        PeriodFacade::end($data);
        $this->getAllPeriods($data);
    }

    public function getAllPeriodsBySessionId(StartPeriodRequest $request){
        $data = $request->all();
        $this->getAllPeriods($data);
    }

    protected function getAllPeriods($data){
        $periods = PeriodFacade::getPeriodsBySessionID($data['session_id']);
        responseData('periods',$periods,200);
    }


}
