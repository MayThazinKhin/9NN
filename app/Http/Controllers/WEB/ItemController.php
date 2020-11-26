<?php

namespace App\Http\Controllers\WEB;

use App\Http\Requests\Web\ItemCreateRequest;
use App\Http\Services\Item\ItemFacade;
use App\Models\Category;
use App\Models\Item;
use App\Models\Type;
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
        $types = Type::all();
        responseData('types',$types,200);
    }

    public function getItemsByTypeID(Request $request){
        $types = Type::whereIn('id',$request->typeIDs)->with('categories.items')->get();
        $items = collect([]) ;
        foreach($types as $type)
            foreach ($type->categories as $category)
                $items =   $items->merge($category->items);
        responseData('items',$items,200);
    }

    public function getItemCategoriesByType(){
        $type_id = Type::where('name','shop')->pluck('id')->first();
        $categories = Category::where('type_id',$type_id)->select('id','name')->get();
        return $categories;
    }

    public function store(ItemCreateRequest $request){
        $data = $request->all();
        Item::create($data);
        return redirect(route('items.index'));
    }

    public function create(){
        $categories = $this->getItemCategoriesByType();
        return view('item.create',compact('categories'));
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
