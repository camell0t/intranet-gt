<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class RegistroController extends Controller
{
    public function __construct()
	{
	    $this->middleware('guest');
	}

	public function index(){
		return view('auth.registro');
	}

	public function verifica(Request $request){

		$nasc = implode("-",array_reverse(explode("/",$request->nascimento)));
		
		$verifica = \App\User::where([
					['cpf', '=', $request->cpf],
					['nascimento', '=', $nasc],
					['login', '=', null]
					])->count();

		$usuario = \App\User::where([
					['cpf', '=', $request->cpf],
					['nascimento', '=', $nasc]
					])->get();

		
		

		if ($verifica > 0) {
			$user = $usuario['0'];
			return view('auth.registro2', compact('user'));
		}else{
			\Session::flash('flash_message', [
            'msg'=>"Os dados fornecidos não foram encontrados ou o usuário já foi cadastrado!",
            'class'=>"alert-danger"
            ]);

            return redirect()->route('registro.index');

		}
	}

	public function salva(\App\Http\Requests\RegistroRequest $request){

		$user = \App\User::find($request->id);
        
    	$user->login = $request->login;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
		$user->save();

		\Session::flash('flash_message', [
            'msg'=>"Cadastro efetuado com sucesso, faça o login para entrar na intranet.",
            'class'=>"alert-success"
            ]);

		return redirect()->route('home.index');

	}
}
//REDIRECIONAR CASO OS DADOS ESTEJAM ERRADOS