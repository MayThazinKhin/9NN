<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
           'name'=>'required',
            'password'=> 'required'
        ];
    }
}
