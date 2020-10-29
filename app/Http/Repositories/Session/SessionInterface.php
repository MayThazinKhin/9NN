<?php


namespace App\Http\Repositories\Session;


interface SessionInterface
{
    public function create($data);

    public function getCurrentSessionID($table_id);
}
