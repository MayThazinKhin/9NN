<?php


namespace App\Http\Services\Session;


use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $all)
 * @method static getCurrentSessionID($table_id)
 */
class SessionFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'App\Http\Services\Session\SessionService';
    }
}
