<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function task(){
    	return $this->belongsTo('App\Task');
    }

    public function project(){
    	return $this->hasMany('App\Leader');
        return $this->hasMany('App\Client');
        return $this->hasMany('App\Team');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

}
