<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model {

    protected $table = 'registrations';

    protected $fillable = [
        'type', 'program', 'batch', 'uu_id', 'email', 'confirmation', 'created_at', 'updated_at'
    ];
}
