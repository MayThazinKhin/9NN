<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;

class BasicController extends Controller
{
    private $model;
    private $var;
    private $route;
    public function __construct($model,$var,$route){
        $this->model = $model;
        $this->var = $var;
        $this->route = $route;
    }

    public function indexData($view_path =null, $extra_data =[]){
        $data = $this->model::orderBy('id', 'desc')->paginate(20);
        $index_data =[$this->route=>$data];
        if(!empty($extra_data)){
            $index_data =  array_merge($index_data,$extra_data);
        }
        if($view_path != null){
            return view($view_path)->with($index_data);
        }
        return view($this->var.'.index')->with($index_data);
    }

    public function storeData($request){
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = StoreImage(collect($data));
        }
         $this->model::create($data);
        return response()->json(array('success' => true) , 200);
    }

    public function updateData($request, $data){
        $data->update($request->all());
        return response()->json(array('success' => true) , 200);
    }

    public function destroyData($data){
      if($data) $data->delete();
        return redirect()->back();
    }

    public function searchData($request, $extra_data = []){
        $query = $request->all()['query'];
        $data = $this->model::where('name', 'LIKE', "%{$query}%")->get();
        $index_data =[$this->route=>$data];
        if(!empty($extra_data)){
            $index_data =  array_merge($index_data,$extra_data);
        }
        return view($this->var.'.search')->with($index_data);
    }

    public function create(){

    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }
}
