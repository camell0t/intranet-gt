<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'titulo.required'=>'Preencha um Título',
            'corpo.required' =>'Digite o conteúdo da postagem',
            'descricao.required'=>'Preencha a descrição'
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
        
        'titulo'=> 'required',
        'corpo'=>'required',
        'descricao'=>'required'

        ];
    }
}
