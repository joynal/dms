<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coffer extends Model {

	protected $table = 'coffers';

    protected $fillable = [
        'program', 'year', 'course_id', 'faculty_id', 'semester_id'
    ];

    public function students(){
        return $this->belongsToMany('App\Models\Student', 'coffer_student', 'coffer_id', 'student_id')->withPivot('status');
    }

    public function examSchedules(){
        return $this->hasMany('App\Models\ExamSchedule');
    }

    public function classSchedules(){
        return $this->hasMany('App\Models\ClassSchedule');
    }

    public function courseResults(){
        return $this->hasMany('App\Models\CourseResult');
    }

    public function levels(){
        return $this->belongsToMany('App\Models\Level', 'coffer_level', 'coffer_id', 'level_id');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function faculty(){
        return $this->belongsTo('App\Models\Faculty');
    }

    public function semester(){
        return $this->belongsTo('App\Models\Semester');
    }

}
