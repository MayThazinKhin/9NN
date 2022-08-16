<?php


namespace App\Http\Repositories\Table;


interface TableInterface
{
    public function getCurrentTableID($marker_id);

    public function getFreeTables();

    public function applyMarkerID($table_id,$marker_id);

    public function freeTable($table);

    public function checkTableFree($table_id);

    public function getName($table_id);
}

