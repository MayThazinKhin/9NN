<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

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

    public function create()
    {

    }

    public function storeData($request)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $data['image'] = StoreImage(collect($data));
        }
         $this->model::create($data);
        return response()->json(array('success' => true) , 200);

//        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id){
      $data =  $this->model::find($id);
      if($data) $data->delete();
      return redirect()->back();
    }
}
