<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model {

	protected $table = 'exam_schedules';

    protected $guarded = [];

    public function courseOffer(){
        return $this->belongsTo('App\Coffer');
    }

    public function faculties(){
        return $this->belongsToMany('App\Faculty', 'exam_schedule_faculty', 'exam_schedule_id', 'faculty_id');
    }

}
