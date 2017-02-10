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

    public function index(){
    	$id = Auth::user()->id;
    	$user = Auth::user();
    	$ocorrencias = \App\Ocorrencias::where('user_id', '=', $id)->paginate(10);
    	
    	return view('ocorrencias.index', compact('ocorrencias', 'user'));
    }



}
