<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    public function discussion(){
    	return $this->belongsTo('App\Discussion');
    }
}
