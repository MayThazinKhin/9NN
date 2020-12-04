<?php

namespace App\Http\Requests\API;

use App\Models\Type;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class ItemCategoryRequest extends APIRequest
{
    public function authorize()
    {
        return parent::authorize();
    }

    public function rules()
    {
        $type = Type::pluck('name')->all();
        return [
            'type' => ['required',
                Rule::in($type)
            ]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator);
    }

}
