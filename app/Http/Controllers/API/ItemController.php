<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ItemRequest;
use App\Http\Services\Item\ItemFacade;
use App\Models\Type;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function getItemCategoriesByType(Request $request){
        $categories =   ItemFacade::getItemCategoriesByType($request->type);
        responseData('categories',$categories,200);
    }

    public function getItemsByCategoryID(ItemRequest $request){
        $items = ItemFacade::getItemsByCategoryID($request);
        $paginate_items = paginate($items,$request);
        responseData('items',$paginate_items,200);
    }


}
