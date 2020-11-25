<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberUpdateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' =>[ 'required',
            Rule::unique('members','name')->ignore($this->member->id)],
            'phone_number' => 'required',
            'address' => 'required',
            'allowance' => 'required'
        ];
    }
}
