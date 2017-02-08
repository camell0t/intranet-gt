<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AuthServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Enquete;
use App\Respostas_enquete;
use App\Envios_formulario;
use App\Formularios;

class FormController extends Controller
{
    public function __construtct(){
		$this->middleware('auth');
	}

	public function index(){		
		$formularios = \App\Formularios::all();
		return view('forms.index', compact('formularios'));
	}

	public function detalhes($id){
		$formulario = \App\Formularios::find($id);
		
		$envios = \App\Envios_formulario::where('formulario_id', '=', $id)->get();
		return view('forms.detalhes', compact('envios', 'formulario'));
	}
}
