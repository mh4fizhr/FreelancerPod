<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileparticipant extends Model
{
    //
    public function discussion(){
    	return $this->belongsTo('App\Discussion');
    }
}
