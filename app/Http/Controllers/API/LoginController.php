<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;


class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $token =  (Auth('api')->attempt($request->all()));
        if($token){
            $token = $this->setToken($token);
            return responseData('data',$token,200);
        }
        return responseStatus('Name and Password do not match',401);
    }

    protected function setToken($token)
    {
        $auth_token = new \stdClass();
        $auth_token->token = $token;
        $auth_token->type = 'Bearer';
        $auth_token->expires_in = null;
        return $auth_token;
    }
}
