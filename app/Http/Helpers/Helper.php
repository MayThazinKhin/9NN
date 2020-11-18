<?php

use App\Http\Actions\Paginate\paginate;
use Illuminate\Database\Eloquent\Relations\Relation;

if(!function_exists('paginate')){
    function paginate($data,$request){
        return  (new paginate($data,$request))->run();
    }
}

if(!function_exists('Model')){
    function Model($model){
        return Relation::getMorphedModel($model);
    }
}

if(!function_exists('UserData')){
    function UserData(){
        return  auth('api')->user();
    }
}

if(!function_exists('CurrentTime')){
    function CurrentTime(){
        return  now()->format('Y-m-d H:i:s');
    }
}






