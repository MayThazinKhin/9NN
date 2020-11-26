<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ItemRequest;
use App\Http\Requests\API\ItemCategoryRequest;
use App\Http\Services\Item\ItemFacade;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function getItemCategoriesByType(Request $request){
        $type_id = Type::where('name',$request->type)->pluck('id')->first();
        $categories = Category::where('type_id',$type_id)->select('id','name')->get();
        responseData('categories',$categories,200);
     //return   ItemFacade::getItemCategoriesByType($request->type);
    }

    public function getItemsByCategoryID(ItemRequest $request){
       ItemFacade::getItemsByCategoryID($request);
    }


}
