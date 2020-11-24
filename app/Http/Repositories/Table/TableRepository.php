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
       return $this->table::where('marker_id',null)->select('id','name','price')->get();
    }

    public function applyMarkerID($table_id, $marker_id){
        $table = $this->table::find($table_id);
        $table->update([
            'marker_id' => $marker_id
        ]);
    }
}
