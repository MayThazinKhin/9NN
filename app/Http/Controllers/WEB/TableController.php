<?php

namespace App\Http\Controllers\WEB;

use App\Http\Requests\Web\TableCreateRequest;
use App\Http\Requests\Web\TableUpdateRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends BasicController
{
    public function __construct(){
        $tables = Table::class;
        parent::__construct( $tables,'table','tables');
    }

    public function index(){
        return  parent::indexData(null,[]);
    }

    public function store(TableCreateRequest $request){
        return parent::storeData($request);
    }

    public function update(TableUpdateRequest $request, Table $table){
        return parent::updateData($request,$table);
    }

    public function destroy(Table $table){
        return parent::destroyData($table);
    }

    public function search(Request $request){
        return parent::searchData($request);
    }

    public function create(){
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


}
