<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'login.required'=>'Insira seu login',
            'login.max'=>'O login não pode ultrapassar 255 caracteres',
            'email.required'=>'Preencha um e-mail',
            'email.email'=>'Preencha um e-mail válido',
            'email.unique'=>'Esse e-mail já está sendo utilizado',
            'email.max'=>'O e-mail não pode ultrapassar 255 caracteres',
            'password.required'=>'Preencha uma senha',
            'password.min'=>'A senha deve conter mais de 6 caracteres',
            'password.confirmed'=>'As senhas não conferem'
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
            'login' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'            
        ];
    }
}
