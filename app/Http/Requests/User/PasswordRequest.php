<?php

namespace App\Http\Requests\User;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->isSA();
    }

    public function rules()
    {
        return [
            'password' => 'required|string|min:4',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Пароль не должно быть пустым',
            'password.min' => 'Пароль не менее 4-х символов',
        ];
    }
}
