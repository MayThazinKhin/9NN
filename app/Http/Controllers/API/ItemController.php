<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ItemRequest;
use App\Http\Services\Item\ItemFacade;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function getItemCategoriesByType(Request $request){
        ItemFacade::getItemCategoriesByType($request->type);
    }

    public function getItemsByCategoryID(ItemRequest $request){
        ItemFacade::getItemsByCategoryID($request);
    }


}
