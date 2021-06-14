<?php


namespace App\Http\Repositories\Table;

use App\Models\Table;

class TableRepository implements TableInterface
{
    private $table;
    public function __construct(){
        $this->table = Table::class;
    }

    public function getCurrentTableID($marker_id){
      return  $this->table::where('marker_id',$marker_id)->pluck('id')->last();
    }

    public function getFreeTables(){
       return $this->table::where('marker_id',null)->select('id','name','price','power_off_price')->get();
    }

    public function applyMarkerID($table_id, $marker_id){
        $table = $this->table::find($table_id);
        $this->updateTable($table,$marker_id);
    }

    public function freeTable($table){
        $this->updateTable($table,null);
    }

    protected function updateTable($table,$data){
        $table->update([
            'marker_id' => $data
        ]);
    }

    public function checkTableFree($table_id){
      $table =   $this->table::where('id',$table_id)->where('marker_id',null)->first();
      return ($table) ? true : false ;
    }
}
