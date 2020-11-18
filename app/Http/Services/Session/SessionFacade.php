<?php


namespace App\Http\Services\Session;
use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $all)
 * @method static getCurrentSessionID($table_id)
 * @method static orderItems($order)
 * @method static getOrderItems()
 * @method static getSessionDetails($session_id)
 * @method static checkSessionID($sessionID)
 */
class SessionFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'App\Http\Services\Session\SessionService';
    }
}
