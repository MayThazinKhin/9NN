<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => 'required|unique:members,name',
            'phone_number' => 'required',
            'address' => 'required',
            'allowance' => 'required'
        ];
    }
}
