<?php


namespace App\Http\Repositories\Session;

use App\Http\Actions\Session\OrderedItems;
use App\Http\Actions\Session\OrderItems;
use App\Http\Actions\Session\SessionCheckout;
use App\Http\Actions\Session\SessionDetails;
use App\Http\Actions\Session\UncheckSessions;
use App\Http\Services\Period\PeriodFacade as Period;
use App\Http\Services\Table\TableFacade as Table;
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
        return $session;
    }

    public function endSession($sessionID){
        $session = $this->checkSessionID($sessionID);
        Period::endLatestPeriod($sessionID);
        $this->updateSession($session);
        Table::freeTable($session->table);
    }

    protected function updateSession($session){
        $session->update([
            'end_time' => CurrentTime()
        ]);
    }

    public function getAllUncheckSessions(){
       return (new UncheckSessions())->run();
    }

    public function checkoutSession($data){
        $session = $this->checkSessionID($data['session_id']);
        (new SessionCheckout())->run($data,$session);
    }
}
