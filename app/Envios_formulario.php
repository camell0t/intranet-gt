<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envios_formulario extends Model
{
    public $table = 'envios_formulario';
   	public $timestamps = false;

   	public function formulario(){
    	return $this->belongsTo('App\Formularios');
    }
    public function username(){
    	return $this->hasMany('App\User');
    }

    public function user(){
    	return $this->belongsTo(\App\User::class); // RECUPERA USUARIO protocolo oi 2017101602104
    	
    }
}
