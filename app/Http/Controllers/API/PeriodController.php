<?php

namespace App\Http\Controllers\API;

use App\Events\Notify;
use App\Events\PeriodConfirmation;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RestartPeriodRequest;
use App\Http\Requests\API\StartPeriodRequest;
use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Session\SessionFacade;
use Illuminate\Http\Request;


class PeriodController extends Controller
{
    public function startPeriod(StartPeriodRequest $request){
        $session = SessionFacade::getSessionDetails($request->session_id);
        event(new Notify($session->session_id,$session->table_name,$session->marker_name));
        responseTrue('success');
    }

    public function confirmPeriod(Request $request){
        $data = $request->all();
        PeriodFacade::start($data);
        (event(new PeriodConfirmation(true)));
        return redirect()->back();
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
