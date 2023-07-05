<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:category,name'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Categoria já existe cadastrada!',
            'name.max' => 'Máximo de caracteres é 255!',
        ];
    }
}
