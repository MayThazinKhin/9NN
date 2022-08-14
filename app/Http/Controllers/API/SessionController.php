<?php

namespace App\Http\Controllers\API;

use App\Http\Actions\Session\CurrentStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\StartSessionRequest;
use App\Http\Services\Period\PeriodFacade as Period;
use App\Http\Services\Session\SessionFacade as Session;
use App\Http\Services\Table\TableFacade as Table;
use App\Models\PowerMood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function startSession(StartSessionRequest $request){
       $is_table_free =   Table::checkTableFree($request->table_id);
       if($is_table_free === true){
           $data = $this->setSessionData($request->all());
           $session =  Session::create($data);
           if($session){
               Table::applyMarkerId($data['table_id'],$data['marker_id']);
               responseData('session_id',$session->id,200);
           }
           responseFalse();
       }
      responseStatus('Table is not free',409);
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
        $current_status = (new CurrentStatus())->run();
        responseData('current_status',$current_status,200);
    }

    public function endSession(Request $request){
        Session::endSession($request->session_id);
        responseTrue('order successfully');
    }

    protected function setSessionData($request){
        $marker = UserData();
        $request['marker_id'] = $marker->id;
        $request['start_time'] = CurrentTime();
        $request['invoice_number'] = $this->generateRandomId();
        return $request;
    }

    protected function getTotalSessionValue($session, $sessionID){
        $order_value = Session::getOrderItems($sessionID)->net_total;
        $table_value = Period::getPeriodsBySessionID($sessionID)->total_value;
        $session->total_value = $order_value + $table_value ;
        return $session;
    }

    private function generateRandomId(){
        $invoice_number = '9N-'.mt_rand(1000000000,9999999999);
        $session_invoice = [
            'invoice_number' => $invoice_number
        ];
        $rules = ['invoice_number' => 'unique:sessions'];
        $validate = Validator::make($session_invoice, $rules)->passes();
        return $validate ? $session_invoice['invoice_number'] : $this->generateRandomId();
    }


}
