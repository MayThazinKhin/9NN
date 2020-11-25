<?php

namespace App\Http\Controllers\WEB;

use App\Http\Requests\Web\TableCreateRequest;
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


    public function create(){
        //
    }


    public function store(TableCreateRequest $request)
    {
        return parent::storeData($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $query = $request->all()['query'];
        $tables = Table::where('name', 'LIKE', "%{$query}%")->get();
        return view('table.search',compact('tables'));
    }
}
