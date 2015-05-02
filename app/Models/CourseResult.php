<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseResult extends Model {

	protected $table = 'course_results';

    protected $guarded = [];

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function courseOffer(){
        return $this->belongsTo('App\Coffer');
    }

}
