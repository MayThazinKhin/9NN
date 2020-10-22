<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function getTables()
    {
        $marker = UserData();
        $tables = Table::where('marker_id',null)->select('id','name','price')->get();
        return responseData('tables',$tables,200);
    }
}
