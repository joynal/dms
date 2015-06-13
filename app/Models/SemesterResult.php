<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterResult extends Model {

	protected $table = 'semester_results';

    protected $guarded = [];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
