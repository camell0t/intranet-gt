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
}
