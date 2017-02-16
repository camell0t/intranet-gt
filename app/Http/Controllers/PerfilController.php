<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;


class PerfilController extends Controller
{

	public function __construct()
	    {
	        $this->middleware('auth');
	    }


	public function index(){

		$id = (Auth::user()->id);
		$user = \App\User::find($id);
		$countSetores = \App\Setor::where('supervisor_id', '=', $id)->count();

		
		if ($countSetores > 0) {
			
			$setores = \App\Setor::orderBy('created_at', 'desc')->where('supervisor_id', '=', $id)->get();
			$setor = $setores[0];
			$count = \App\Ocorrencias::where([
    							['setor_id', '=', $setor->id],
    							['situacao', '=', "Pendente"]
    							])->count();
			
    		return view('perfil.index', compact('user', 'count'));
		}else{

			return view('perfil.index', compact('user'));
		}
    	
    	    	
    	
    	
	}

	public function editaremail(){

		$id = (Auth::user()->id);
		$usuario = \App\User::find($id);

		return view('perfil.editaremail', compact('usuario'));
	}

	public function atualizaremail(\App\Http\Requests\EmailAtualizaRequest $request, $id){
		$user = \App\User::find($id);
		$user->email = $request->email;
		$user->save();

		 \Session::flash('flash_message', [
            'msg'=>"Endereço de e-mail atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('perfil.editaremail');
	
	}

	public function editarsenha(){

		$id = (Auth::user()->id);
		$usuario = \App\User::find($id);

		return view('perfil.editarsenha', compact('usuario'));
	}

	public function atualizarsenha(\App\Http\Requests\UsuarioAtualizarSenhaRequest $request,$id){
    	
            $user = \App\User::find($id);
            if (Hash::check($request->get('senhaatual'), $user->password)) { // CHECA O HASH DA SENHA ATUAL COM A SENHA RECEBIDA
				$user->password = bcrypt($request->password);
            	$user->save();
	                
		        \Session::flash('flash_message', [
		            'msg'=>"Senha alterada com Sucesso!",
		            'class'=>"alert-success"
		        ]);

	        	return redirect()->route('perfil.index');
            }else{
               	
               	\Session::flash('flash_message', [
	            'msg'=>"Senha atual inválida!",
	            'class'=>"alert-danger"
	        	]);
        		return redirect()->route('perfil.editarsenha');
	        }

      
	
    }

    public function atualizaravatar(Request $request){
    	
    	if ($request->hasFile('avatar')) {
    		$user = Auth::user();
    		$avatar = $request->file('avatar');
    		$filename = strtolower($user->name)."_".time().".".$avatar->getClientOriginalExtension();
    		Image::make($avatar)->save( public_path('/uploads/perfil/'.$filename));

    		
    		$user->avatar = $filename;
    		$user->save();

    			\Session::flash('flash_message', [
	            'msg'=>"Imagem alterada com sucesso!",
	            'class'=>"alert-success"
	        	]);
    	}

    	return redirect()->route('perfil.index');
    	

    }
    


}
