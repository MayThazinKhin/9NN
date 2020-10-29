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

}
