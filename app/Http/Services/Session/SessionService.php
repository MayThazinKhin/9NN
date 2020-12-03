<?php


namespace App\Http\Services\Session;
use App\Http\Repositories\Session\SessionInterface;

class SessionService
{
    protected $session;
    public function __construct(SessionInterface $session){
        $this->session = $session;
    }

    public function create($data){
        return  $this->session->create($data);
    }

    public function getCurrentSessionID($table_id){
        return $this->session->getCurrentSessionID($table_id);
    }

    public function orderItems($data){
        return $this->session->orderItems($data);
    }

    public function getOrderItems($sessionID){
        return $this->session->getOrderItems($sessionID);
    }

    public function getSessionDetails($sessionID){
        return $this->session->getSessionDetails($sessionID);
    }

    public function checkSessionID($sessionID){
        return $this->session->checkSessionID($sessionID);
    }

    public function endSession($sessionID){
        return $this->session->endSession($sessionID);
    }

}
