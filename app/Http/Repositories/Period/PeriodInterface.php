<?php


namespace App\Http\Repositories\Period;


interface PeriodInterface
{
    public function start($data);

    public function end($data);

    public function getPeriodsBySessionID($sessionID);

    public function checkPeriodID($id);
}
