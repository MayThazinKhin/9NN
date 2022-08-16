<?php


namespace App\Http\Services\Table;
use Illuminate\Support\Facades\Facade;

/**
 * @method static getCurrentTableID($marker_id)
 * @method static getFreeTables()
 * @method static applyMarkerId($table_id, $marker_id)
 * @method static freeTable($table)
 * @method static checkTableFree($table_id)
 * @method static getName($table_id)
 */
class TableFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'App\Http\Services\Table\TableService';
    }
}
