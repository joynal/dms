<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model {

	protected $table = 'exam_schedules';

    protected $guarded = [];

    public function coffer(){
        return $this->belongsTo('App\Models\Coffer');
    }

    public function faculties(){
        return $this->belongsToMany('App\Models\Faculty', 'exam_schedule_faculty', 'exam_schedule_id', 'faculty_id');
    }

    public function semester(){
        return $this->belongsTo('App\Models\Semester');
    }

    public function levels(){
        return $this->belongsToMany('App\Models\Level', 'exam_schedule_level', 'exam_schedule_id', 'level_id');
    }

}
