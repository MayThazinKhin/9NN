<?php


namespace App\Http\Services\Period;

use Illuminate\Support\Facades\Facade;

/**
 * @method static start(array $data)
 * @method static end(array $data)
 * @method static getPeriodsBySessionID($session_id)
 * @method static endLatestPeriod($sessionID)
 */
class PeriodFacade extends Facade
{
    public static function getFacadeAccessor(){
        return 'App\Http\Services\Period\PeriodService';
    }
}
