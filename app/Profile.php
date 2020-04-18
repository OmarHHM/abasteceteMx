<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = ['id_user','isBusiness'];

    public function user(){
    	return $this->hasOne('App\User');
    }
}
