<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя пользователя не должно быть пустым',
            'email.required' => 'Email не должно быть пустым',
            'email.email' => 'Недопустимый адрес Email',
            'email.unique' => 'Адрес Email уже используется',
            'password.required' => 'Пароль не должно быть пустым',
            'password.min' => 'Пароль не менее 4-х символов',
        ];
    }
}
