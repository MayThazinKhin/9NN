<?php

namespace App\Http\Requests\API;

class SellItemRequest extends APIRequest
{
    public function authorize()
    {
        return parent::authorize();
    }

    public function rules()
    {
        return [
            'items'=> 'required'
        ];
    }
}
