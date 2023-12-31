<?php


namespace App\Http\Repositories\Session;

use App\Http\Actions\Session\OrderedItems;
use App\Http\Actions\Session\OrderItems;
use App\Http\Actions\Session\SessionCheckout;
use App\Http\Actions\Session\SessionCredits;
use App\Http\Actions\Session\SessionDetails;
use App\Http\Actions\Session\SessionEnding;
use App\Http\Actions\Session\UncheckSessions;
use App\Models\Session;

class SessionRepository implements SessionInterface
{
    private $session;
    public function __construct(){
        $this->session = Session::class;
    }

    public function create($data){
        return $this->session::create($data);
    }

    public function getCurrentSessionID($table_id){
        return $this->session::where('table_id', $table_id)->where('end_time', null)->pluck('id')->last();
    }

    public function orderItems($data){
        $session = $this->checkSessionID($data['session_id']);
        (new OrderItems())->run($session,$data);
         return true;
    }

    public function getOrderItems($sessionID){
        $session = $this->checkSessionID($sessionID);
        return  (new OrderedItems())->run($session);
    }

    public function getSessionDetails($sessionID){
        $session = $this->checkSessionID($sessionID);
        return (new SessionDetails())->run($session);
    }

    public function checkSessionID($sessionID){
        $session = $this->session::where('id', $sessionID)->first();
        if (!$session)
            responseStatus('Requested session ID is not found', 400);
//        if($session->end_time <> null && $session->cashier_id <> null){
//            responseStatus('Requested session ID is already checkout', 400);
//        }
        return $session;
    }

    public function endSession($sessionID){
        $session = $this->checkSessionID($sessionID);
        (new SessionEnding())->run($session);
    }

    public function getAllUncheckSessions(){
       return (new UncheckSessions())->run();
    }

    public function checkoutSession($data){
        $session = $this->checkSessionID($data['session_id']);
        return  (new SessionCheckout())->run($data,$session);
    }

    public function getCreditSessions(){
        return (new SessionCredits())->run();
    }

    public function getSessionCredit($memberID){
        return  $this->session::where('member_id',$memberID)->where('is_done',false)->sum('credit');
    }

    public function getTaxValue($sessionID){
        return  $this->session::where([['id',$sessionID],['is_tax',false]])->pluck('tax')->first();
    }

    public function getMarker($sessionID){
        $session = $this->checkSessionID($sessionID);
        return $session->marker;
    }
}
