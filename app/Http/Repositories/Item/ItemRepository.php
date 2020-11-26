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
        $type_id = Type::where('name',$type)->pluck('id')->first();
        $categories = Category::where('type_id',$type_id)->select('id','name')->get();
        responseData('categories',$categories,200);
    }

    public function getItemsByCategoryID($request){
        $items  = Item::where('category_id',$request->category_id)->select('id','name','price','count')->get();
        $paginate_items = paginate($items,$request);
        responseData('items',$paginate_items,200);
    }

    public function getAllTypes(){
        $types = Type::all();
        responseData('types',$types,200);
    }

    public function getItemsByTypeID(array $typeIDs){
        $types = Type::whereIn('id',$typeIDs)->with('categories.items')->get();
        $items = collect([]) ;
        foreach($types as $type)
            foreach ($type->categories as $category)
                $items =   $items->merge($category->items);
        responseData('items',$items,200);
    }
}
