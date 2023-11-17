<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:40',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo autor é obrigatório',
            'nome.max' => 'O campo autor deve ter no máximo 40 caracteres',
        ];
    }
}
