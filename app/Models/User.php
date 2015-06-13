<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    /**
     * @var array
     */
    protected $fillable = [
       'uid', 'type', 'first_name', 'last_name', 'gender', 'socialite', 'contact', 'image', 'email', 'password', 'created_at', 'updated_at',
    ];


    protected $hidden = ['password', 'remember_token'];
    /**
     * @return bool
     */
    public function isAdmin(){
        return $this->type == 'admin';
    }

    /**
     * @return bool
     */
    public function isStudent(){
        return $this->type == 'student';
    }

    /**
     * @return bool
     */
    public function isFaculty(){
        return $this->type == 'faculty';
    }

    /**
     * @return bool
     */
    public function isNotUser(){
        return $this->type != 'user';
    }

    public function student(){
        return $this->hasOne('App\Models\Student', 'user_id');
    }

    public function faculty(){
        return $this->hasOne('App\Models\Faculty', 'user_id');
    }

}
