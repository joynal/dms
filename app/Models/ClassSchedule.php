<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model {

    protected $guarded = [];

	protected $table = 'class_schedules';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coffer(){
        return $this->belongsTo('App\Models\Coffer');
    }

    public function semester(){
        return $this->belongsTo('App\Models\Semester');
    }

    public function levels(){
        return $this->belongsToMany('App\Models\Level', 'class_schedule_level', 'class_schedule_id', 'level_id');
    }

}
