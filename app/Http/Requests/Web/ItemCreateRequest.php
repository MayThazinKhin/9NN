<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name'=> 'required',
            'category_id' => 'required',
            'price' => 'required'
        ];
    }
}
