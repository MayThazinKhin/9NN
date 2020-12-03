<?php


namespace App\Http\Repositories\Session;


interface SessionInterface
{
    public function create($data);

    public function getCurrentSessionID($table_id);

    public function orderItems($data);

    public function getOrderItems($sessionID);

    public function getSessionDetails($sessionID);

    public function checkSessionID($sessionID);

    public function endSession($sessionID);
}
