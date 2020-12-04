<?php


namespace App\Http\Services\Period;

use App\Http\Repositories\Period\PeriodInterface;

class PeriodService
{
    protected static $period;
    public function __construct(PeriodInterface $period){
        self::$period = $period;
    }

    public static function  start($data){
        return  self::$period->start($data);
    }

    public static function end($data){
        return self::$period->end($data);
    }

    public static function getPeriodsBySessionID($sessionID){
        return self::$period->getPeriodsBySessionID($sessionID);
    }

    public function endLatestPeriod($sessionID){
        return self::$period->endLatestPeriod($sessionID);
    }
}
