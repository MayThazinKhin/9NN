<?php


namespace App\Http\Services\Table;

use App\Http\Repositories\Table\TableInterface;

class TableService
{
    protected $table;
    public function __construct(TableInterface $table){
        $this->table = $table;
    }

    public function getCurrentTableID($marker_id){
        return $this->table->getCurrentTableID($marker_id);
    }

    public function getFreeTables(){
        return $this->table->getFreeTables();
    }

    public function applyMarkerID($table_id,$marker_id){
        return $this->table->applyMarkerID($table_id,$marker_id);
    }

    public function freeTable($table){
        return $this->table->freeTable($table);
    }

    public function checkTableFree($table_id){
        return $this->table->checkTableFree($table_id) ;
    }

    public function getName($table_id){
        return $this->table->getName($table_id);
    }
}
