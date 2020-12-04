<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StartSessionRequest;
use App\Http\Services\Period\PeriodFacade as Period;
use App\Http\Services\Session\SessionFacade as Session;
use App\Http\Services\Table\TableFacade as Table;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function startSession(StartSessionRequest $request){
       $data = $this->setSessionData($request->all());
       $session =  Session::create($data);
       if($session){
            Table::applyMarkerId($data['table_id'],$data['marker_id']);
            responseData('session_id',$session->id,200);
       }
       responseFalse();
    }

    public function orderItems(Request $request){
        $order = JsonDecode($request->items);
        $is_success_order =  Session::orderItems($order);
        if($is_success_order){
            $orders = Session::getOrderItems($order['session_id']);
            responseData('orders',$orders,200);
        }
       responseFalse();
    }

    public function getOrderItems(Request $request){
        $orders = Session::getOrderItems($request->session_id);
        responseData('orders',$orders,200);
    }

    public function getSessionById(Request $request){
        $sessionID = $request->session_id;
        $session = Session::getSessionDetails($sessionID);
        $session = $this->getTotalSessionValue($session,$sessionID);
        responseData('session',$session,200);
    }

    public function getCurrentTime(){
        responseData('time',CurrentTime(),200);
    }

    public function endSession(Request $request){
        Session::endSession($request->session_id);
        responseTrue('order successfully');
    }

    protected function setSessionData($request){
        $marker = UserData();
        $request['marker_id'] = $marker->id;
        $request['start_time'] = now()->format('Y-m-d H:i:s');
        return $request;
    }

    protected function getTotalSessionValue($session, $sessionID){
        $order_value = Session::getOrderItems($sessionID)->net_total;
        $table_value = Period::getPeriodsBySessionID($sessionID)->total_value;
        $session->total_value = $order_value + $table_value ;
        return $session;
    }


}
