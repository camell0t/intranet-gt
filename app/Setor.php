<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    public $table = 'setores'; 	

   	public function user(){
    	return $this->belongsTo(\App\User::class); // RECUPERA USUARIO
    }
}
