<?php

namespace App\Http\Repositories\Item;

use App\Models\Category;
use App\Models\Item;
use App\Models\Type;

class ItemRepository implements ItemInterface
{
    private $type;
    private $category;
    private $item;
    public function __construct(){
        $this->type = Type::class;
        $this->category = Category::class;
        $this->item = Item::class;
    }

    public function getItemCategoriesByType($type){
        $type_id = $this->type::where('name',$type)->pluck('id')->first();
        return $this->category::where('type_id',$type_id)->select('id','name')->get();
    }

    public function getItemsByCategoryID($request){
       return $this->item::where('category_id',$request->category_id)->select('id','name','price','count','category_id')->get();
    }

    public function getAllTypes(){
       return Type::all();
    }

    public function getItemsByTypeID(array $typeIDs){
        $types = $this->type::whereIn('id',$typeIDs)->with('categories.items')->get();
        $items = collect([]) ;
        foreach($types as $type)
            foreach ($type->categories as $category)
                $items =   $items->merge($category->items);
        return $items;
    }
}
