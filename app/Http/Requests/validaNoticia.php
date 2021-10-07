<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validaNoticia extends FormRequest
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
            'titulo' => 'required|min:3|max:50',
            'conteudo' => 'required|min:10|max:5000',
            'img' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Preencha o nome!',
            'conteudo.required' => 'Preencha o conteudo com pelos menos 10 caracteres!',
            'img.required' => 'Insera uma imagem!',
            'titulo.min' => 'Preencha o nome com pelo menos 3 caracteres!',
            'conteudo.required' => 'Preencha o conteudo com pelos menos 10 caracteres!',
            'img.image' => 'Formato invalido!',
        ];

    }
}
