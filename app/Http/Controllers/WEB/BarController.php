<?php

namespace App\Http\Controllers\WEB;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class BarController extends BasicController
{
    protected $items;
    public function __construct(){
        $this->items = Item::class;
        parent::__construct( $this->items,'bar','bars');
    }

    public function index(){
        $category_IDs = Category::where('type_id','!=',1)->pluck('id')->all();
        $bars = Item::whereIn('category_id',$category_IDs)->orderBy('id', 'desc')->paginate(20);
        return view('bar.index',compact('bars'));
    }

    public function create(){
        return view('bar.create');
    }

    public function store(Request $request){
        $data = $request->all();
        Item::create($data);
        return redirect(route('bars.index'));
    }

    public function update(Request $request, Item $item){
        return parent::updateData($request,$item);
    }

    public function destroy(Item $item){
        return parent::destroyData($item);
    }

    public function show($id){
        //
    }


    public function edit($id){
        //
    }



}
