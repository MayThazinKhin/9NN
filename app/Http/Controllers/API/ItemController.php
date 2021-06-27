<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ItemRequest;
use App\Http\Services\Item\ItemFacade;
use App\Models\ItemInventory;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function getItemCategoriesByType(Request $request){
        $categories =   ItemFacade::getItemCategoriesByType($request->type);
        responseData('categories',$categories,200);
    }

    public function getItemsByCategoryID(ItemRequest $request){
        $items_by_category_id =  ItemFacade::getItemsByCategoryID($request);
        foreach ($items_by_category_id as $item){
            if(!$item->category->is_countable) {
                $item->count = null;
            }
            else{
                 $item_count =  ItemInventory::where([['item_id',$item->id],['type_id',$item->category->type->id]])->pluck('count')->first();
                 $item->count = ($item_count) ?  : 0;
            }
            unset($item['category']);
        }
        $paginate_items = paginate($items_by_category_id,$request);
        responseData('items',$paginate_items,200);
    }


}
