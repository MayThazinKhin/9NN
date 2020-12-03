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
        $category_IDs = Category::where('type_id',1)->pluck('id')->all();
        $items = Item::whereIn('category_id',$category_IDs)->orderBy('id', 'desc')->paginate(20);
        return view('item.index',compact('items'));
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

    public function store(ItemCreateRequest $request){
        $data = $request->all();
        Item::create($data);
        return redirect(route('items.index'));
    }

    public function create(){
        $categories = ItemFacade::getItemCategoriesByType('shop');
        dd($categories);
        return view('item.create',compact('categories'));
    }

    public function getAllTypes(){
       $types =  ItemFacade::getAllTypes();
       return $types;
    }

    public function getItemsByTypeID(Request $request){;
     $items =  ItemFacade::getItemsByTypeID($request->typeIDs);
     return $items;
    }

}
