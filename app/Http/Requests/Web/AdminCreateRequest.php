<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:staff,name',
            'password' => 'required|min:6',
            'role_id' => 'required'
        ];
    }
}
