<?php

if(!function_exists('responseData')){
    function responseData($name,$data,$status){
        return response()->json([
            $name => $data
        ],$status);
    }
}

if(!function_exists('responseStatus')){
    function responseStatus($message,$status){
        return responseData('message',$message,$status);
    }
}


if(!function_exists('responseFalse')){
    function responseFalse(){
        return responseData('message','Something is wrong at Server',500);
    }
}

if(!function_exists('responseTrue')){
    function responseTrue($message){
        return responseData('message',$message,200);
    }
}





