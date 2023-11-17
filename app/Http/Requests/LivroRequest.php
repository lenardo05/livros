<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|max:40',
            'editora' => 'required|max:40',
            'edicao' => 'required|integer',
            'ano_publicacao' => 'required|digits:4',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo :attribute é obrigatório',
            'titulo.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
            'editora.required' => 'O campo :attribute é obrigatório',
            'editora.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
            'edicao.integer' => 'O campo :attribute deve ser um número inteiro',
            'edicao.required' => 'O campo :attribute é obrigatório',
            'ano_publicacao.digits' => 'O campo :attribute deve ter 4 dígitos',
            'ano_publicacao.required' => 'O campo :attribute é obrigatório',

        ];
    }
}
