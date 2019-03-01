<?php

namespace App\Http\Requests\Client;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->isSA() || Auth::user()->isNSI() || Auth::user()->isProjector();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование не должно быть пустым',
        ];
    }
}
