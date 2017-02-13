<?php

namespace App\Http\Controllers;
use App\Providers\AuthServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Posts;
use App\User;
use App\Post_principal;
use App\Enquete;
use App\Respostas_enquete;
use App\Envios_formulario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = \App\Posts::paginate(5);
        $mes = date("m");
        $dia = date("d");
        $ano = date("Y");
        $postPrinc = \App\Post_principal::orderBy('created_at', 'desc')->get();
        $enquetes = \App\Enquete::orderBy('created_at', 'desc')->where('situacao', '=', 1)->get();
        $sugestoes = \App\Formularios::orderBy('created_at', 'desc')->where('situacao', '=', 1)->get();
        
        $posts = \App\Posts::orderBy('created_at', 'desc')->limit(5)->paginate(5);
        $aniversarioDia = \App\User::whereMonth('nascimento', '=', $mes)->whereDay('nascimento', '=', $dia)->get();
        $aniversarioMes = \App\User::whereMonth('nascimento', '=', $mes)->get();
        $countMes = \App\User::whereMonth('nascimento', '=', $mes)->count();



        //setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        //date_default_timezone_set('America/Sao_Paulo');
        //dd(strftime('%Y', strtotime("-3 months")));
        

        

        return view('home', compact('posts', 'aniversarioDia', 'aniversarioMes', 'postPrinc', 'enquetes', 'sugestoes', 'countMes'));
    }

    public function postagem($id){

        $mes = date("m");
        $dia = date("d");
        $ano = date("Y");
        $enquetes = \App\Enquete::orderBy('created_at', 'desc')->where('situacao', '=', 1)->get();
        $sugestoes = \App\Formularios::orderBy('created_at', 'desc')->where('situacao', '=', 1)->get();        
        $aniversarioDia = \App\User::whereMonth('nascimento', '=', $mes)->whereDay('nascimento', '=', $dia)->get();
        $aniversarioMes = \App\User::whereMonth('nascimento', '=', $mes)->get();
        $countMes = \App\User::whereMonth('nascimento', '=', $mes)->count();

        $post = \App\Posts::find($id);
        
        return view('postagem', compact('post', 'aniversarioDia', 'aniversarioMes', 'enquetes', 'sugestoes', 'countMes'));
    }

    public function permissoes(){
        echo "<h2>".auth()->user()->name."</h2>";
        echo "<br>";
        foreach (auth()->user()->roles as $role) {
        echo $role->name;
        echo "<br>";
        $permissions = $role->permissions;    
            foreach ($permissions as $permission) {
                echo $permission->name.", ";
            }
            echo "<hr>";            
        }
    }

    public function salvarenquete(Request $request, $id){
        $userid = Auth::user()->id;
        $enqueteid= $id;

        $resp_enquete = new \App\Respostas_enquete();
        $verifica = \App\Respostas_enquete::where([
                ['user_id', '=', $userid],
                ['enquete_id', '=', $enqueteid]
                ])->count();

        if ($verifica > 0) {
            \Session::flash('flash_message', [
            'msg'=>"Você não pode votar novamente",
            'class'=>"alert-danger"
            ]);

            return redirect()->route('home.index');
        }else{
        $resp_enquete->enquete_id = $id;
        $resp_enquete->user_id = $userid;
        $resp_enquete->resposta = $request->resposta;
        $resp_enquete->save();

        \Session::flash('flash_message', [
            'msg'=>"Seu voto foi salvo com sucesso, obrigado!",
            'class'=>"alert-success"
            ]);

            return redirect()->route('home.index');
        }
    }
    public function salvarformulario(\App\Http\Requests\FormularioRequest $request, $id){
        $userid = Auth::user()->id;
        $formid= $id;

        $envio_form = new \App\Envios_formulario();
       

      
        $envio_form->formulario_id = $id;
        $envio_form->user_id = $userid;
        $envio_form->mensagem = $request->mensagem;
        $envio_form->save();

        \Session::flash('flash_message', [
            'msg'=>"Sua mensagem foi enviada com sucesso, obrigado!",
            'class'=>"alert-success"
            ]);

            return redirect()->route('home.index');
    }
    
    public function colaboradores(){

        $usuarios = \App\User::paginate(20);
        $mes = date("m");
        $dia = date("d");
        $ano = date("Y");
        $enquetes = \App\Enquete::orderBy('created_at', 'desc')->where('situacao', '=', 1)->get();
        $sugestoes = \App\Formularios::orderBy('created_at', 'desc')->where('situacao', '=', 1)->get();        
        $aniversarioDia = \App\User::whereMonth('nascimento', '=', $mes)->whereDay('nascimento', '=', $dia)->get();
        $aniversarioMes = \App\User::whereMonth('nascimento', '=', $mes)->get();
        $countMes = \App\User::whereMonth('nascimento', '=', $mes)->count();


        return view('paginas.colaboradores', compact('usuarios', 'aniversarioDia', 'aniversarioMes', 'enquetes', 'sugestoes', 'countMes'));
    }



}


