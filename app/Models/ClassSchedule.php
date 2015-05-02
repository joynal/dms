<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model {

    protected $guarded = [];

	protected $table = 'class_schedules';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseOffers(){
        return $this->belongsTo('App\Coffer');
    }

}
