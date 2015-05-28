<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model {

    protected $table = 'semesters';

    protected $fillable = [
        'name', 'year', 'form', 'to'
    ];

	public function coffers(){
        return $this->hasMany('App\Models\Coffer');
    }

    public function classSchedules(){
        return $this->hasMany('App\Models\ClassSchedule');
    }

    public function examSchedules(){
        return $this->hasMany('App\Models\ExamSchedule');
    }
}
