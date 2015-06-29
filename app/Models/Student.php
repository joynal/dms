<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    /**
     * @var string
     */
    protected $table = 'students';

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseResults(){
        return $this->hasMany('App\Models\CourseResult');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function semesterResults(){
        return $this->hasMany('App\Models\SemesterResult');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function coffers(){
        return $this->belongsToMany('App\Models\Coffer')->withPivot('status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
