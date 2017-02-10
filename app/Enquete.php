<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    public $table = 'enquete';
   	
   	public function UserEnquete(){
    	return $this->belongsTo('App\User');
    }
}
