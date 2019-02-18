<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('user')->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя пользователя не должно быть пустым',
            'email.required' => 'Email не должно быть пустым',
            'email.email' => 'Недопустимый адрес Email',
            'email.unique' => 'Адрес Email уже используется',
        ];
    }
}
