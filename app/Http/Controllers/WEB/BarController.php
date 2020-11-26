<?php

namespace App\Http\Controllers\WEB;

use App\Models\Item;
use Illuminate\Http\Request;

class BarController extends BasicController
{
    protected $items;
    public function __construct(){
        $this->items = Item::class;
        parent::__construct( $this->items,'item','items');
    }

    public function index(){
        return  parent::indexData(null,[]);
    }

    public function create(){
        return view('bar.create');
    }

    public function store(Request $request){
      return  parent::storeData($request);
    }

    public function update(Request $request, Item $item){
        return parent::updateData($request,$item);
    }

    public function destroy(Item $item){
        return parent::destroyData($item);
    }

    public function show($id){
        //
    }


    public function edit($id){
        //
    }



}
