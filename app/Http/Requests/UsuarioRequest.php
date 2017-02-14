<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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

    public function messages(){

        return [        
            'name.required'=>'Preencha seu nome',
            'name.max'=>'O nome não pode ultrapassar 255 caracteres',
            'sobrenome.required' => 'Preencha seu sobrenome',
            'sobrenome.max' => 'O sobrenome não pode ultrapassar 255 caracteres',
            'funcao.max' => 'A função não pode ultrapassar 255 caracteres',
            'funcao.required' => 'Preencha a função',
            'empresa.required' => 'Selecione uma empresa',
            'cpf.required' => 'Preencha o CPF',
            'nascimento.required' => 'Informe o nascimento',
            'setor.required' => 'Preencha o setor'

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'funcao' => 'required|max:255',
            'empresa' => 'required',
            'cpf' => 'required',
            'nascimento' => 'required',
            'setor' => 'required'
        ];
    }
}
