<?php

namespace App\Http\Requests\Adm;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->isSA() || Auth::user()->isProjector();
    }

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
