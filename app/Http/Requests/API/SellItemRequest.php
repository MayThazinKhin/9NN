<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class SellItemRequest extends APIRequest
{
    public function authorize(){
        return parent::authorize();
    }

    public function rules(){
        return [
            'items'=> 'required'
        ];
    }
    public function failedValidation(Validator $validator){
        parent::failedValidation($validator);
    }



}
