<?php

namespace App\Http\Controllers\WEB;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends BasicController
{
    public function __construct(){
        $items = Item::class;
        parent::__construct( $items,'item','items');
    }

    public function index(){
//        $roles = Role::all();
//        $extra_data  = ['roles'=>$roles];
        return  parent::indexData(null,[]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
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


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Item $item)
    {
        return parent::destroyData($item);
    }

    public function search(Request $request){
        $query = $request->all()['query'];
        $items = Item::where('name', 'LIKE', "%{$query}%")->get();
        return view('item.search',compact('items'));
    }
}
