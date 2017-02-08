<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posts;
use App\Post_principal;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{

	public function __construtct(){
		$this->middleware('auth');
	}

    public function index(){
    	if (Auth::user()->can('editor') == true ){
    		$posts = \App\Posts::orderBy('created_at', 'desc')->paginate(5);
           
    	return view('postagens.index', compact('posts'));
    	}else{

    		return redirect()->route('perfil.index');
    	}

    }

    public function adicionar(){
		if (Auth::user()->can('editor') == true ){
    		//$post = \App\Posts::find($id);
    		//dd($post);
    		$id = Auth::user()->id;

    	return view('postagens.adicionar', compact('id'));
    	}else{

    		return redirect()->route('perfil.index');
    	}

    }

    public function salvar(\App\Http\Requests\PostRequest $request, $id){
    	if (Auth::user()->can('editor') == true ){

	    	$post = new \App\Posts();
            

             if ($request->hasFile('img')) {
                
                $img = $request->file('img');
                $filename = "post".time().".".$img->getClientOriginalExtension();
                Image::make($img)->resize(240,150)->save( public_path('/uploads/post/'.$filename));
            
    	    	$post->titulo = $request->titulo;
    	    	$post->corpo = $request->corpo;
    	    	$post->descricao = $request->descricao;
                $post->img_destacada = $filename;
    	    	$post->user_id = $id;    	
    			$post->save();

                return redirect()->route('postagens.index');

    			\Session::flash('flash_message', [
    	    			'msg'=>"Postagem adicionada com Sucesso!",
    	    			'class'=>"alert-success"
    	    		]);

    			return redirect()->route('postagens.index');
            }else{
                $post->titulo = $request->titulo;
                $post->corpo = $request->corpo;
                $post->descricao = $request->descricao;
                $post->user_id = $id;       
                $post->save();

                return redirect()->route('postagens.index');
                \Session::flash('flash_message', [
                        'msg'=>"Postagem adicionada com Sucesso!",
                        'class'=>"alert-success"
                    ]);
            }
		}else{

    		return redirect()->route('perfil.index');

    	}
    }

    public function editar($id){

        if (Auth::user()->can('adm') == true ){
            $post = \App\Posts::find($id);
            return view('postagens.editar', compact('post'));
        }
        else{
            return redirect()->route('perfil.index');
        }
    }

    public function atualizar(\App\Http\Requests\PostRequest $request, $id){

 	 if (Auth::user()->can('adm') == true ){
        $post = \App\Posts::find($id);

        if ($request->hasFile('img')) {
            
            $img = $request->file('img');
            $filename = "post".time().".".$img->getClientOriginalExtension();
            Image::make($img)->resize(240,150)->save( public_path('/uploads/post/'.$filename));

            $post->titulo = $request->titulo;
            $post->corpo = $request->corpo;
            $post->descricao = $request->descricao;
            $post->img_destacada = $filename;
            $post->save();          
           	

           	\Session::flash('flash_message', [
	    			'msg'=>"Postagem atualizada com Sucesso!",
	    			'class'=>"alert-success"
	    		]);

			return redirect()->route('postagens.index');

        }else{
            $post->titulo = $request->titulo;
            $post->corpo = $request->corpo;
            $post->descricao = $request->descricao;
            $post->save();

            \Session::flash('flash_message', [
                    'msg'=>"Postagem atualizada com Sucesso!",
                    'class'=>"alert-success"
                ]);

            return redirect()->route('postagens.index');   
        }
        
        }else{
            return redirect()->route('perfil.index');
        }
    }

    public function deletar($id){

        if (Auth::user()->can('adm') == true ){
            $post = \App\Posts::find($id);
            $post->delete();

            	\Session::flash('flash_message', [
	    			'msg'=>"Postagem deletada com Sucesso!",
	    			'class'=>"alert-success"
	    		]);

			return redirect()->route('postagens.index');
        }
        else{
            return redirect()->route('perfil.index');
        }
    }

    public function indexprincipal(){

        if (Auth::user()->can('editor') == true ){
            $postprincipal = \App\Post_principal::paginate(5);
            return view('postagens.indexprincipal', compact('postprincipal'));
        }else{

            return redirect()->route('perfil.index');
        }
    }

    public function adicionarprincipal(){

        
        return view('postagens.addprincipal');
    }

    public function salvarprincipal(Request $request){

        if ($request->hasFile('img')) {
            $user = Auth::user();
            $postp = new \App\Post_principal();
            $img = $request->file('img');
            $filename = strtolower($request->titulo)."_".time().".".$img->getClientOriginalExtension();
            Image::make($img)->resize(770,300)->save( public_path('/uploads/postprincipal/'.$filename));

            
            $postp->img = $filename;
            $postp->titulo = $request->titulo;
            $postp->descricao = $request->descricao;
            $postp->referencia = $request->referencia;
            $postp->user_id = $user->id;
            $postp->save();

                \Session::flash('flash_message', [
                'msg'=>"Postagem principal adicionada com sucesso!",
                'class'=>"alert-success"
                ]);
        }

        return redirect()->route('postagemprincipal.adicionar');
    }

     public function editarprincipal($id){

        if (Auth::user()->can('adm') == true ){
            $postp = \App\Post_principal::find($id);
            return  view('postagens.editarprincipal', compact('postp'));
            
        }
        else{
            return redirect()->route('perfil.index');
        }
    }

    public function deletarprincipal($id){

        if (Auth::user()->can('adm') == true ){
            $postp = \App\Post_principal::find($id);
            $postp->delete();

                \Session::flash('flash_message', [
                    'msg'=>"Postagem deletada com Sucesso!",
                    'class'=>"alert-success"
                ]);

            return redirect()->route('postagemprincipal.index');
        }
        else{
            return redirect()->route('perfil.index');
        }
    }

    public function atualizarprincipal(Request $request, $id){

        if (Auth::user()->can('adm') == true ){
            $user = Auth::user();
            $postp = \App\Post_principal::find($id);         
            
            if ($request->hasFile('img')) {
                
                $img = $request->file('img');
                $filename = strtolower($request->titulo)."_".time().".".$img->getClientOriginalExtension();
                Image::make($img)->resize(770,300)->save( public_path('/uploads/postprincipal/'.$filename));

                $postp->img = $filename;
                $postp->titulo = $request->titulo;
                $postp->descricao = $request->descricao;
                $postp->referencia = $request->referencia;
                $postp->user_id = $user->id;
                $postp->save();

                \Session::flash('flash_message', [
                        'msg'=>"Postagem atualizada com Sucesso!",
                        'class'=>"alert-success"
                    ]);
                return redirect()->route('postagemprincipal.index');
            }else{

               
                $postp->titulo = $request->titulo;
                $postp->descricao = $request->descricao;
                $postp->referencia = $request->referencia;
                $postp->user_id = $user->id;
                $postp->save();
                return redirect()->route('postagemprincipal.index');
            }        
        }else{
            return redirect()->route('perfil.index');
        }
    }    
}
