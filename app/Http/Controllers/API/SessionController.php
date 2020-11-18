<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StartSessionRequest;
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
        $input_items = stripslashes($request->items);
        $order = json_decode( $input_items, true );
        if($order == null){
            responseStatus('input data is not corrected',402);
        }
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
        $session = Session::getSessionDetails($request->session_id);
        responseData('session',$session,200);
    }

    protected function setSessionData($request){
        $marker = UserData();
        $request['marker_id'] = $marker->id;
        $request['start_time'] = now()->format('Y-m-d H:i:s');
        return $request;
    }


}
