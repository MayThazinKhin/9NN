<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;

class RestartPeriodRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'session_id'=>'required',
            'period_id' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        parent::failedValidation($validator);
    }
}
