<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencias extends Model
{
      public $table = 'ocorrencias_ponto'; 	

   	public function user(){
    	return $this->belongsTo(\App\User::class); // RECUPERA USUARIO
    }
}

