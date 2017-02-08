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
            'email.required'=>'Preencha um e-mail',
            'email.email'=>'Preencha um e-mail válido',
            'email.unique'=>'Esse e-mail já está sendo utilizado',
            'email.max'=>'O e-mail não pode ultrapassar 255 caracteres',
            'password.required'=>'Preencha uma senha',
            'password.min'=>'A senha deve conter mais de 6 caracteres',
            'password.confirmed'=>'As senhas não conferem',
            'sobrenome.required' => 'Preencha seu sobrenome',
            'sobrenome.max' => 'O sobrenome não pode ultrapassar 255 caracteres',
            'funcao.max' => 'A função não pode ultrapassar 255 caracteres',
            'funcao.required' => 'Preencha a função',
            'empresa.required' => 'Selecione uma empresa',
            'cpf.required' => 'Preencha o CPF',
            'nascimento.required' => 'Informe o nascimento',
            'password_confirmation.required' => 'Confirme a senha',
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'sobrenome' => 'required|max:255',
            'funcao' => 'required|max:255',
            'empresa' => 'required',
            'cpf' => 'required',
            'nascimento' => 'required',
            'password_confirmation' => 'required',
            'setor' => 'required'
        ];
    }
}
