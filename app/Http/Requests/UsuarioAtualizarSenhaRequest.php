<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioAtualizarSenhaRequest extends FormRequest
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
            'password.required'=>'Preencha uma senha',
            'password.min'=>'A senha deve conter mais de 6 caracteres',
            'password.confirmed'=>'As senhas não conferem',
            'password_confirmation.required' => 'Confirme a senha'
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
            'password' => 'required|min:6|confirmed',           
            'password_confirmation' => 'required'
        ];
    }
}
