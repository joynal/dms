<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseResult extends Model {

	protected $table = 'course_results';

    protected $guarded = [];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function courseOffer(){
        return $this->belongsTo('App\Models\Coffer');
    }

}
