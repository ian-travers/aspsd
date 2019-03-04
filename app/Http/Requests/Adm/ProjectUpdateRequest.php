<?php

namespace App\Http\Requests\Adm;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'client_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование не должно быть пустым',
        ];
    }
}
