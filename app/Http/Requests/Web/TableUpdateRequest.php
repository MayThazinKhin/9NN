<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TableUpdateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' =>[ 'required',
              Rule::unique('tables','name')->ignore($this->table->id)],
            'price' => 'required'
        ];
    }
}
