<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends APIRequest
{
    public function authorize()
    {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'password' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator);
    }
}
