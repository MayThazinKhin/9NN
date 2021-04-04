<?php


namespace App\Http\Services\Session;
use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $all)
 * @method static getCurrentSessionID($table_id)
 * @method static orderItems($order)
 * @method static getOrderItems($session_id)
 * @method static getSessionDetails($session_id)
 * @method static checkSessionID($sessionID)
 * @method static endSession($session_id)
 * @method static uncheck()
 * @method static checkout(array $all)
 * @method static credits()
 * @method static sessionCredits($memberID);
 * @method static getTaxValue($sessionID);
 * @method static getMarker($sessionID);
 */
class SessionFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'App\Http\Services\Session\SessionService';
    }
}
