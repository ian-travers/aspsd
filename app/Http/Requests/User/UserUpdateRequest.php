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
            'post.max' => 'Название должности не более 255 символов',
            'surname.max' => 'Фамилия не более 30 символов',
            'first_name.max' => 'Название должности не более 30 символов',
            'patronymic_name.max' => 'Название должности не более 30 символов',
        ];
    }
}
