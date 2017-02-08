<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailAtualizaRequest extends FormRequest
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
            
            'email.required'=>'Preencha um e-mail',
            'email.email'=>'Preencha um e-mail válido',
            'email.unique'=>'Esse e-mail já está sendo utilizado',
            'email.max'=>'O e-mail não pode ultrapassar 255 caracteres',
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
            
            'email' => 'required|email|max:255|unique:users'
            
        ];
    }
}
