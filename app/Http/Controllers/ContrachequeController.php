<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Contracheque;
use \App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ContrachequeController extends Controller
{


	public function __construct(){
		$this->middleware('auth');
	}


    public function index(){
    	if (Auth::user()->can('envia_contracheque') == true ){

    	$usuarios = User::paginate(5);
    	return view('contracheque.usuarios', compact('usuarios'));
    	}else{
    		return redirect()->route('perfil.index');
    	}
	}
     public function salva(Request $request) {
        if($request->hasFile('contracheque')) {
            if ($request->file('contracheque')->isValid()) {
            	$contracheque = new \App\Contracheque();
            	$user_id = $request->user_id;
            	$referencia = $request->referencia;
            	
                $arquivo = $request->file('contracheque');

                // Filename will be a hash of the original name plus the curent time. Ending in the original extension.
              
                $filename = $user_id . '_' .$referencia . '.' .time() . $arquivo->getClientOriginalExtension();

                 //$filename = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();

              	$path = $arquivo->storeAs($user_id, $filename, 'contracheque');

                 // Save file info in the database.
              	$envio_user_id =  Auth::user()->id;
                $contracheque = new \App\Contracheque();

                $contracheque->referencia = $referencia;
                $contracheque->envio_user_id = $envio_user_id;
                $contracheque->user_id = $request->user_id;
                $contracheque->path = $path;
                $contracheque->mime = $arquivo->getMimeType();
                $contracheque->save();

		        \Session::flash('flash_message', [
		            'msg'=>"Contracheque enviado com sucesso!",
		            'class'=>"alert-success"
		        ]);

		        return redirect()->route('contracheque.index');
		                
            }
        }
        
	}

	public function lista(){
		$id = Auth::user()->id;
		$contracheques = \App\Contracheque::where('user_id', '=', $id)->paginate(5);
		
		return view('contracheque.lista', compact('contracheques'));

	}

	public function download($id){

		$user = Auth::user();
		$contracheque = Contracheque::find($id);

		if (Auth::user()->can('Recursos Humanos') == true ){

			return response()->download(storage_path().'/app/contracheques/'.$contracheque->path);

		}elseif($contracheque->user_id == $user->id){

			return response()->download(storage_path().'/app/contracheques/'.$contracheque->path); // $contracheque->name

		}else{

			\Session::flash('flash_message', [
		            'msg'=>"Você não tem permissão pra acessar essa página",
		            'class'=>"alert-danger"
		        ]);
			return redirect()->route('home.index');
		}
	}

	public function delete($id){

		$user = Auth::user();
		$contracheque = Contracheque::find($id);

		if (Auth::user()->can('Recursos Humanos') == true ){

			$path = storage_path().'/app/contracheques/'.$contracheque->path;

			Storage::delete($path);
			$contracheque->delete();
			\Session::flash('flash_message', [
		            'msg'=>"Contracheque excluído com sucesso!",
		            'class'=>"alert-success"
		        ]);
			return redirect()->route('contracheque.index');
			//return response()->download(storage_path().'/app/contracheques/'.$contracheque->path, $contracheque->name);

		}else{

			\Session::flash('flash_message', [
		            'msg'=>"Você não tem permissão pra acessar essa página",
		            'class'=>"alert-danger"
		        ]);
			return redirect()->route('home.index');
		}
	}		
	

	
	public function envios($id){
		$contracheques = Contracheque::where('user_id', '=', $id)->paginate(10);
		return view('contracheque.envios', compact('contracheques'));

	}

}
