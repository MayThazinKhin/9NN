<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StartSessionRequest;
use App\Http\Services\Session\SessionFacade ;
use App\Http\Services\Table\TableFacade;

class SessionController extends Controller
{
    public function startSession(StartSessionRequest $request){
       $data = $this->setSessionData($request->all());
       $session =  SessionFacade::create($data);
       if($session){
            TableFacade::applyMarkerId($data['table_id'],$data['marker_id']);
            return responseData('session_id',$session->id,200);
       }
       return responseFalse();
    }

    public function getTime(){
        $time =  now()->format('Y-m-d H:i:s');
        return responseData('time',$time,200);
    }

    protected function setSessionData($request){
        $marker = UserData();
        $request['marker_id'] = $marker->id;
        $request['start_time'] = now()->format('Y-m-d H:i:s');
        return $request;
    }


}
