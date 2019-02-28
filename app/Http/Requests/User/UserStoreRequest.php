<?php

namespace App\Http\Requests\User;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->isSA();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
            'post' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:30',
            'first_name' => 'nullable|string|max:30',
            'patronymic_name' => 'nullable|string|max:30',
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
            'post.max' => 'Название должности не более 255 символов',
            'surname.max' => 'Фамилия не более 30 символов',
            'first_name.max' => 'Название должности не более 30 символов',
            'patronymic_name.max' => 'Название должности не более 30 символов',
        ];
    }
}
