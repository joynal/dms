<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {

	protected $table = 'faculties';

    protected $guarded = [];

    public function courseOffers(){
        return $this->hasMany('App\Models\Coffer');
    }

    public function examSchedules(){
        return $this->belongsToMany('App\Models\ExamSchedule', 'exam_schedule_faculty', 'exam_schedule_id', 'faculty_id');
    }


}
