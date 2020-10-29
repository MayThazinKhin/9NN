<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\Table\TableFacade as Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function getTables()
    {
        $tables = Table::getFreeTables();
        return responseData('tables',$tables,200);
    }
}
