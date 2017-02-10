<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_principal extends Model
{
	public $table = 'post_principal';
   	
   	public function UserPostPrinc(){
    	return $this->belongsTo('App\User');
    }
}
