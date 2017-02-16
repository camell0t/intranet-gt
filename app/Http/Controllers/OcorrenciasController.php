<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AuthServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use \App\Ocorrencias;

class OcorrenciasController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){ // lista ocorrencias do usuario logado
    	$id = Auth::user()->id;
    	$user = Auth::user();
    	$ocorrencias = \App\Ocorrencias::where([
    					['user_id', '=', $id],
    					['situacao', '=', 'Pendente'],
    					])->paginate(10);
    	
    	return view('ocorrencias.index', compact('ocorrencias', 'user'));
    }

    public function registro(){ // redireciona para a pagina de registro
    	$usuario = Auth::user();

    	return view('ocorrencias.registro', compact('usuario'));
    }

    public function salvar(\App\Http\Requests\OcorrenciaRequest $request){ // salva uma ocorrencia registrada pelo usuario logado
    	$usuario = Auth::user();
    	$user_id = $usuario->id;

    	$data = implode("-",array_reverse(explode("/",$request->data)));
    	
    	$ocorrencia = new  \App\Ocorrencias;
    	$ocorrencia->setor_id = $request->setor;
    	$ocorrencia->user_id = $user_id;
    	$ocorrencia->data = $data;
    	$ocorrencia->horario = $request->horario;
    	$ocorrencia->periodo = $request->periodo;
    	$ocorrencia->justificativa = $request->justificativa;
    	$ocorrencia->complemento = $request->complemento;
    	$ocorrencia->situacao = "Pendente";
    	$ocorrencia->save();

    	\Session::flash('flash_message', [
    			'msg'=>"Ocorrência registrada com Sucesso!",
    			'class'=>"alert-success"
    		]);

		return redirect()->route('ocorrencias.index');
    
    }

    public function delete($id){ // deleta uma ocorrencia registrada pelo usuario logado
    	$usuario = Auth::user();
    	$user_id = $usuario->id;

    	$ocorrencia = \App\Ocorrencias::find($id);
    	
    	if ($ocorrencia->user_id == $user_id) {
    		$ocorrencia->delete();

    		\Session::flash('flash_message', [
    			'msg'=>"Ocorrência deletada com Sucesso!",
    			'class'=>"alert-success"
    		]);

		return redirect()->route('ocorrencias.index');
    	}else{

    	}

    }

    public function lista(){ // lista de ocorrencias de funcionarios pendentes
        if (Auth::user()->can('finaliza_ocorrencias') == true ){

            $id = Auth::user()->id;

            $setores = \App\Setor::orderBy('created_at', 'desc')->where('supervisor_id', '=', $id)->get();
            $setor = $setores[0];
            

            $ocorrencias = \App\Ocorrencias::where([
                            ['setor_id', '=', $setor->id],
                            ['situacao', '=', 'Pendente'],
                            ])->paginate(15);

            return view('ocorrencias.lista', compact('ocorrencias'));
            

        }else{

            return redirect()->route('perfil.index');          
        }
    	
    	
    }

    public function finalizar(Request $request, $id){ // finaliza uma ocorrencia de funcionario

    	
    	
		$user_id = Auth::user()->id;

    	$setores = \App\Setor::orderBy('created_at', 'desc')->where('supervisor_id', '=', $user_id)->get();
    	$setor = $setores[0];
    	if ($user_id == $setor->supervisor_id) {

			$ocorrencia = \App\Ocorrencias::find($id);
    		$ocorrencia->situacao = $request->situacao;
    		$ocorrencia->obs = $request->obs;
    		$ocorrencia->save();

    		\Session::flash('flash_message', [
    			'msg'=>"Ocorrência finalizada com Sucesso!!",
    			'class'=>"alert-success"
    		]);

		return redirect()->route('ocorrencias.lista');
    	
    	}

    }
    public function finalizadas(){ // lista de ocorrencias de funcionarios pendentes
        if (Auth::user()->can('finaliza_ocorrencias') == true ){
    	$id = Auth::user()->id;

    	$setores = \App\Setor::orderBy('created_at', 'desc')->where('supervisor_id', '=', $id)->get();
    	$setor = $setores[0];    	
    	

    	$ocorrencias = \App\Ocorrencias::orderBy('created_at', 'desc')->where([
    					['setor_id', '=', $setor->id],
    					['situacao', '<>', 'Pendente'],
    					])->paginate(15);

    	return view('ocorrencias.finalizadas', compact('ocorrencias'));
    	
        }else{
             return redirect()->route('perfil.index');
        }
    }

    public function finalizadas_usuario(){
    	$id = Auth::user()->id;

    	$ocorrencias = \App\Ocorrencias::orderBy('created_at', 'desc')->where([
    					['user_id', '=', $id],
    					['situacao', '<>', 'Pendente'],
    					])->paginate(15);
    	return view('ocorrencias.finalizadas_usuario', compact('ocorrencias'));

    }

    public function relatorios(){
        if (Auth::user()->can('relatorio_ocorrencias') == true ){
        $usuarios = \App\User::all();

        return view('ocorrencias.relatorios', compact('usuarios'));
        }else{
            return redirect()->route('ocorrencias.lista');
        }
    }
    public function relatorio_finalizadas(Request $request){
        
        $dataini = $request->data_inicio;
        $datafim = $request->data_fim;
        $data_inicio = implode("-",array_reverse(explode("/",$request->data_inicio)));
        $data_fim = implode("-",array_reverse(explode("/",$request->data_fim)));
        
        $ocorrencias = \App\Ocorrencias::where([
                                        ['user_id', '=', $request->usuario],
                                        ['situacao', '<>', "Pendente"],
                                        ])->whereBetween('data', array($data_inicio, $data_fim))->get();
        
        $nome = $ocorrencias['0']->user->name;
        $sobrenome = $ocorrencias['0']->user->sobrenome;

        $empresa = $ocorrencias['0']->user->empresa;
        if ($empresa == "G TRIGUEIRO TECNOLOGIA LTDA") {

            $cnpj = "14.273.573/0001-01";
        
        }elseif ($empresa == "G TRIGUEIRO BRASIL SERVIÇOS TECNOLÓGICOS LTDA") {
            
            $cnpj = "08.336.975/0001-05";

        }elseif ($empresa == "MAQUINAS E EQUIPAMENTOS COMERCIAL LTDA") {

            $cnpj = "00.702.550/0001-52";

        }elseif ($empresa == "MAQUIP LOCAÇÃO E SERVIÇOS EIRELI - EPP") {
            $cnpj = "24.202.806/0001-20";
        }else{

        }

        

        return view('ocorrencias.relatorio_finalizadas', compact('ocorrencias', 'dataini', 'datafim', 'nome', 'sobrenome', 'cnpj'));


        
    }


}
