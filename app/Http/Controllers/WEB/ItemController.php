<?php

namespace App\Http\Controllers\WEB;

use App\Http\Services\Item\ItemFacade;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends BasicController
{
    public function __construct(){
        $items = Item::class;
        parent::__construct( $items,'item','items');
    }

    public function index(){
        return  parent::indexData(null,[]);
    }

    public function destroy(Item $item){
        return parent::destroyData($item);
    }

    public function search(Request $request){
        return parent::searchData($request);
    }

    public function update(Request $request,Item $item){
        return parent::updateData($request,$item);
    }

    public function getAllTypes(){
       ItemFacade::getAllTypes();
    }

    public function getItemsByTypeID(Request $request){
        ItemFacade::getItemsByTypeID($request->type_ids);
    }

    public function getItemCategoriesByType(Request  $request){
        ItemFacade::getItemCategoriesByType($request->type);
    }

    public function store(Request $request){
        return parent::storeData($request);
    }

    public function create(){

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
