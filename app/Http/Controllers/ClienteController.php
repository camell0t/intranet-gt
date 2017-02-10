<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$clientes = \App\Cliente::paginate(5); // all listaria todos os dados, paginate da opcao de usar o metodo links para paginacao na view
    	return view('cliente.index', compact('clientes'));
    }

    public function adicionar(){

    	return view('cliente.adicionar');	
    }

    public function detalhe($id){
        $cliente = \App\Cliente::find($id);
        return view('cliente.detalhe', compact('cliente'));
    }

    public function salvar(\App\Http\Requests\ClienteRequest $request){ // request recebe dados do formulario
    	\App\Cliente::create($request->all());

    	\Session::flash('flash_message', [
    			'msg'=>"Cliente adicionado com Sucesso!",
    			'class'=>"alert-success"
    		]);

    	return redirect()->route('cliente.adicionar');
    }
    
    public function editar($id){
		$cliente = \App\Cliente::find($id);
		if (!$cliente) {
			\Session::flash('flash_message', [
    			'msg'=>"Esse cliente não existe!",
    			'class'=>"alert-danger"
    		]);
    		return redirect()->route('cliente.adicionar');
		}

		return view('cliente.editar', compact('cliente'));

    }

    public function atualizar(Request $request,$id){
		\App\Cliente::find($id)->update($request->all());
		
		\Session::flash('flash_message', [
			'msg'=>"Cliente atualizado com Sucesso!",
			'class'=>"alert-success"
		]);

		return redirect()->route('cliente.index');

    }

    public function deletar($id){

    	$cliente = \App\Cliente::find($id);

        if(!$cliente->deletarTelefones()){

                \Session::flash('flash_message', [
            'msg'=>"O registro não pode ser deletado!",
            'class'=>"alert-danger"
        ]);
                return redirect()->route('cliente.index');
        }

    	$cliente->delete();

    	\Session::flash('flash_message', [
			'msg'=>"Cliente deletado com Sucesso!",
			'class'=>"alert-success"
		]);

		return redirect()->route('cliente.index');


    }

}
