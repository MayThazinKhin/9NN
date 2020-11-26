<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ItemRequest;
use App\Http\Requests\API\ItemCategoryRequest;
use App\Http\Services\Item\ItemFacade;

class ItemController extends Controller
{
    public function getItemCategoriesByType(ItemCategoryRequest $request){
        ItemFacade::getItemCategoriesByType($request->type);
    }

    public function getItemsByCategoryID(ItemRequest $request){
       ItemFacade::getItemsByCategoryID($request);
    }


}
