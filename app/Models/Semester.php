<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model {

	public function coffers(){
        return $this->hasMany('App\Models\Coffer');
    }

}
