<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracheque extends Model
{
    public $table = 'contracheque';
   	

   	public function user(){
    	return $this->belongsTo(\App\User::class); // RECUPERA USUARIO
    	
    }
}
