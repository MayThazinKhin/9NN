<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RestartPeriodRequest;
use App\Http\Requests\API\StartPeriodRequest;
use App\Http\Services\Period\PeriodFacade;


class PeriodController extends Controller
{
    public function startPeriod(StartPeriodRequest $request){
        $data = $request->all();
        PeriodFacade::start($data);
        return $this->getAllPeriods($data);
    }

    public function restartPeriod(RestartPeriodRequest $request){
        $data = $request->all();
        PeriodFacade::end($data);
        PeriodFacade::start($data);
        return $this->getAllPeriods($data);
    }

    public function endPeriod(RestartPeriodRequest $request){
        $data = $request->all();
        PeriodFacade::end($data);
        return $this->getAllPeriods($data);
    }

    protected function getAllPeriods($data){
        $periods = PeriodFacade::getPeriodsBySessionID($data['session_id']);
        responseData('periods',$periods,200);
    }
}
