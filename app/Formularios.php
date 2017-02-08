<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formularios extends Model
{
    public $table = 'formulario';
   	
   	public function UserFormulario(){
    	return $this->belongsTo('App\User');
    }

}
