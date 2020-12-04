<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ];
    }
}
