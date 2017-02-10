<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respostas_enquete extends Model
{
    public $table = 'respostas_enquete';
   	public $timestamps = false;
   	public function enquete(){
    	return $this->belongsTo('App\Enquetes');
    }
    public function user(){
    	return $this->belongsTo(\App\User::class); // RECUPERA USUARIO protocolo oi 20171016021047
    	
    }
}
