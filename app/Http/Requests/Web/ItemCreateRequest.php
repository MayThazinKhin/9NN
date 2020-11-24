<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
{

    public function authorize(){
        return false;
    }


    public function rules()
    {
        return [
            //
        ];
    }
}
