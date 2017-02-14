<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AuthServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Role_user;
use App\Permission;
use App\Setor;  

class UsuarioController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
               
    }

    public function index(){

     if (Auth::user()->can('Administrador') == true ){
            $usuarios = \App\User::paginate(5); // all listaria todos os dados, paginate da opcao de usar o metodo links para paginacao na view
            return view('usuario.index', compact('usuarios'));
        }
        else{
            return redirect()->route('perfil.index');
        }   	
    
    
    }

    public function salvar(\App\Http\Requests\UsuarioRequest $request){

    	$user = new \App\User();
        $nasc = implode("-",array_reverse(explode("/",$request->nascimento)));
    	$user->name = $request->name;
    	$user->sobrenome = $request->sobrenome;
    	$user->cpf = $request->cpf;
    	$user->nascimento = $nasc;
        $user->setor_id = $request->setor;
    	$user->funcao = $request->funcao;
    	$user->empresa = $request->empresa;    	
		$user->save();

		\Session::flash('flash_message', [
    			'msg'=>"Usuário adicionado com Sucesso!",
    			'class'=>"alert-success"
    		]);

		return redirect()->route('perfil.registro');
    }

    public function registro(){ // VERIFICA SE O USUARIO LOGADO TEM PERMISSAO DE ADM
        if (Auth::user()->can('Administrador') == true ){
            $setores = \App\Setor::all();
            return view('perfil.registro', compact('setores'));
        }
        else{
            return redirect()->route('perfil.index');
        }
        
    }

    public function editar($id){

        if (Auth::user()->can('Administrador') == true ){
            $usuario = \App\User::find($id);
            $setores = \App\Setor::all();

            return view('usuario.editar', compact('usuario', 'setores'));
        }
        else{
            return redirect()->route('perfil.index');
        }

    	
    }

     public function atualizar(\App\Http\Requests\UsuarioAtualizaRequest $request,$id){
		
        if (Auth::user()->can('Administrador') == true ){
            $user = \App\User::find($id);
            $nasc = implode("-",array_reverse(explode("/",$request->nascimento)));

                        
            $user->name = $request->name;
            $user->sobrenome = $request->sobrenome;
            $user->cpf = $request->cpf;
            $user->nascimento = $nasc;
            $user->setor_id = $request->setor;
            $user->funcao = $request->funcao;
            $user->empresa = $request->empresa;         
            $user->save();
                    
            \Session::flash('flash_message', [
                'msg'=>"Usuário atualizado com Sucesso!",
                'class'=>"alert-success"
            ]);

            return redirect()->route('usuario.index');
        }
        else{
            return redirect()->route('perfil.index');
        }



    }

    public function editarsenha($id){

        if (Auth::user()->can('Administrador') == true ){
            $usuario = \App\User::find($id);
            return view('usuario.editarsenha', compact('usuario'));
        }
        else{
            return redirect()->route('perfil.index');
        }

        
    }

    public function atualizarsenha(\App\Http\Requests\UsuarioAtualizarSenhaRequest $request,$id){
          if (Auth::user()->can('Administrador') == true ){
            $user = \App\User::find($id);       
            $user->password = bcrypt($request->password);
            $user->save();
                
        \Session::flash('flash_message', [
            'msg'=>"Senha alterada com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('usuario.index');
        }
        else{
            return redirect()->route('perfil.index');
        }
	
    }

      public function deletar($id){

        $usuario = \App\User::find($id);

        /*if(!$cliente->deletarTelefones()){

                \Session::flash('flash_message', [
            'msg'=>"O registro não pode ser deletado!",
            'class'=>"alert-danger"
        ]);
                return redirect()->route('cliente.index');
        }
        */

        $usuario->delete();

        \Session::flash('flash_message', [
            'msg'=>"Usuário deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('usuario.index');


    }

    public function editaracesso($id){

        if (Auth::user()->can('Administrador') == true ){
            //recupera o usuario
            $usuario = \App\User::find($id);
            $roles =  $usuario->roles()->get(); // recebe a funcao roles da model Roles
            $allroles = \App\Role::all();
            //dd($allroles);

            
            return view('usuario.editaracesso', compact('usuario', 'roles', 'allroles')); // recupera a tabela role_user e envia para a view
            

         
        }
        else{
            return redirect()->route('perfil.index');
        }

    }

    public function atualizaacesso(Request $request, $id){

        if (Auth::user()->can('Administrador') == true ){
            $usuario = \App\User::find($id);
            $acesso = new \App\Role_user;
            $roleid = $request->input('role_id');

            $dados = \App\Role_user::where([
                ['user_id', '=', $id],
                ['role_id', '=', $roleid]
                ])->count(); // consulta a tabela user_id e role_id, em seguida faz a contagem. count, get
                
            if ($dados >= 1) {
               \Session::flash('flash_message', [
                    'msg'=>"O Usuário já possui o acesso selecionado",
                    'class'=>"alert-danger"
                ]);
                return redirect()->route('usuario.acesso', $id);                
            }else{   

                $acesso->role_id = $request->input('role_id');
                $acesso->user_id = $id;
                $acesso->save();        
                
                \Session::flash('flash_message', [
                'msg'=>"Acesso alterado com Sucesso!",
                'class'=>"alert-success"
                ]);
                return redirect()->route('usuario.acesso', $id);
            }

        }else{
            return redirect()->route('perfil.index');
        }
    }

    public function deletaracesso($id, $roleid){

        if (Auth::user()->can('Administrador') == true ){
         $dados = \App\Role_user::where([
                ['user_id', '=', $id],
                ['role_id', '=', $roleid]
                ]);
         $dados->delete();
         \Session::flash('flash_message', [
                'msg'=>"Acesso removido com sucesso!",
                'class'=>"alert-success"
                ]);
                return redirect()->route('usuario.acesso', $id);

        }else{
            return redirect()->route('perfil.index');
        }

    }

}
