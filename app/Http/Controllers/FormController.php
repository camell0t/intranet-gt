<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
		
		$envios = \App\Envios_formulario::where('formulario_id', '=', $id)->paginate(5);		
		
		// $user_envio = DB::select('select u.name, u.sobrenome, e.mensagem from users as u right join envios_formulario as e on e.user_id = u.id');
		



		return view('forms.detalhes', compact('envios', 'formulario'));
	}

	public function enqueteindex(){

		$enquetes = \App\Enquete::all();
		$count1 = \App\Respostas_enquete::where('resposta', '=', 'Ótimo')->count();
		$count2 = \App\Respostas_enquete::where('resposta', '=', 'Muito bom')->count();
		$count3 = \App\Respostas_enquete::where('resposta', '=', 'Bom')->count();
		$count4 = \App\Respostas_enquete::where('resposta', '=', 'Ruim')->count();
		$count5 = \App\Respostas_enquete::where('resposta', '=', 'Muito ruim')->count();
		$total = $count1 + $count2 + $count3 + $count4 + $count5;
		
		return view('forms.enqueteindex', compact('enquetes', 'count1', 'count2', 'count3', 'count4', 'count5', 'total'));
	}
	public function enquetedetalhes($id){
		$enquete = \App\Enquete::find($id);
		
		$envios = \App\Respostas_enquete::where('enquete_id', '=', $id)->paginate(5);
	
			
		
		// $user_envio = DB::select('select u.name, u.sobrenome, e.mensagem from users as u right join envios_formulario as e on e.user_id = u.id');
		



		return view('forms.enquetedetalhes', compact('enquete', 'envios'));
	}
}
