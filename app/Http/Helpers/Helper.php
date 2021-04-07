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

if(!function_exists('JsonDecode')){
    function JsonDecode($raw_data){
        $input_items = stripslashes($raw_data);
        $json_data = json_decode( $input_items, true );
        if($json_data == null){
            responseStatus('input data is not corrected',402);
        }
        return $json_data;
    }
}

if(!function_exists('FirstWord')){
    function FirstWord($code){
       return intval(substr($code, 0, 1));
    }
}




