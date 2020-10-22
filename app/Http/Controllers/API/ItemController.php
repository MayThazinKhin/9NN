<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ItemRequest;
use App\Http\Requests\API\ItemCategory;
use App\Models\Category;
use App\Models\Item;
use App\Models\Type;

class ItemController extends Controller
{
    public function getItemCategoriesByType(ItemCategory $request){
        $type_id = Type::where('name',$request->type)->pluck('id')->first();
        $categories = Category::where('type_id',$type_id)->select('id','name')->get();
        return responseData('categories',$categories,200);
    }

    public function getItemsByCategoryID(ItemRequest $request){
        $items  = Item::where('category_id',$request->category_id)->select('id','name','price','count')->get();
        $paginate_items = paginate($items,$request);
        return responseData('items',$paginate_items,200);
    }
}
