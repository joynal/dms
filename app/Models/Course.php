<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $table = 'courses';

    protected $fillable = [
        'id', 'name', 'credit', 'program'
    ];

    public function courseOffers(){
        return $this->hasMany('App\Models\Coffer');
    }

}
