<?php


namespace App\Http\Services\Session;
use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Static_;

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
 * @method static pay($data)
 * @method static sessionCredits($memberID);
 */
class SessionFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'App\Http\Services\Session\SessionService';
    }
}
