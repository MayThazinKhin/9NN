<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => ['required',
                Rule::unique('staff','name')->ignore($this->staff->id)],
            'password' => 'required',
            'role_id' => 'required'
        ];
    }
}
