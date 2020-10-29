<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Table\TableInterface;
use App\Http\Requests\API\LoginRequest;
use App\Http\Services\Session\SessionFacade;
use App\Http\Services\Table\TableFacade as Table;

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
        $auth_token->session_id = $this->getCurrentSessionID();
        return $auth_token;
    }

    protected function getCurrentSessionID()
    {
       $marker =  UserData();
       $marker_id = $marker->id;
       $table_id =  Table::getCurrentTableID($marker_id);
       return ($table_id) ?  SessionFacade::getCurrentSessionID($table_id) : $table_id ;
    }
}
