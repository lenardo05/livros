<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuntoRequest extends FormRequest
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
            'descricao' => 'required|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'descricao.required' => 'O campo assunto é obrigatório',
            'descricao.max' => 'O campo assunto deve ter no máximo 20 caracteres',
        ];
    }
}
