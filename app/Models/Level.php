<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model {

	protected $table = 'levels';

    protected $guarded = [];

    public function students(){
        return $this->hasMany('App\Models\Student');
    }

    public function courseOffers(){
        return $this->belongsToMany('App\Models\Coffer', 'coffer_level', 'coffer_id', 'level_id');
    }

    public function classSchedules(){
        return $this->belongsToMany('App\Models\ClassSchedules');
    }

    public function examSchedules(){
        return $this->belongsToMany('App\Models\ExamSchedules');
    }
}
