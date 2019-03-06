<?php

namespace App\Http\Requests\ProjectDoc;

use Illuminate\Foundation\Http\FormRequest;

class DocRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'signer_name' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'doc_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование не должно быть пустым',
            'doc_date.required' => 'Дата не должна быть пустой',
        ];
    }
}
