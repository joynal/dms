<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Coffer extends Model {

	protected $table = 'coffers';

    protected $guarded = [];

    public function students(){
        return $this->belongsToMany('App\Student', 'coffer_student', 'coffer_id', 'student_id');
    }

    public function examSchedules(){
        return $this->hasMany('App\ExamSchedule');
    }

    public function classSchedules(){
        return $this->hasMany('App\ClassSchedule');
    }

    public function courseResults(){
        return $this->hasMany('App\CourseResult');
    }

    public function levels(){
        return $this->belongsToMany('App\Level', 'coffer_level', 'coffer_id', 'level_id');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

}
