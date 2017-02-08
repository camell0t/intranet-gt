<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
	public $table = 'role_user';
	public $timestamps = false;
	public function role_user(){
    	return $this->belongsTo('App\Role_user');
    }
}
