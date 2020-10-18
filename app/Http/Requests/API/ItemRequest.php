<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;

class ItemRequest extends APIRequest
{
    public function authorize(){
        return  parent::authorize();
    }

    public function rules(){
        return [
            'category_id'=> ['required','numeric']
        ];
    }

    public function failedValidation(Validator $validator){
         parent::failedValidation($validator);
    }
}
