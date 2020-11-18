<?php


namespace App\Http\Services\Period;


use Illuminate\Support\Facades\Facade;

/**
 * @method static start(\App\Http\Requests\API\StartPeriodRequest $request)
 * @method static end(array $data)
 * @method static getPeriodsBySessionID($session_id)
 */
class PeriodFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'App\Http\Services\Period\PeriodService';
    }
}
