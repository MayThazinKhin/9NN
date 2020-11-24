<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;

class StartPeriodRequest extends APIRequest
{
    public function authorize(){
        return parent::authorize();
    }

    public function rules(){
        return [
            'session_id'=>'required'
        ];
    }

    public function failedValidation(Validator $validator){
        parent::failedValidation($validator);
    }
}
