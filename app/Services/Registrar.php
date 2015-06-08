<?php namespace App\Services;

use Validator;
use App\Models\User;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Registration;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'uid'        => 'required|unique:users',
            'first_name' => 'required|max:100',
            'last_name'  => 'required|max:100',
            'email'      => 'required|email|max:255|unique:users',
            'batch'      => 'required',
            'birth_date' => 'required',
            'gender'     => 'required',
            'image'      => 'required|mimes:png,jpg,jpeg',
            'password'   => 'required|confirmed|min:5',
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function validatorFaculty(array $data)
    {
        return Validator::make($data, [
            'uid'          => 'required|unique:users',
            'first_name'   => 'required|max:100',
            'last_name'    => 'required|max:100',
            'email'        => 'required|email|max:255|unique:users',
            'joining_date' => 'required',
            'designation'  => 'required',
            'gender'       => 'required',
            'image'      => 'required|mimes:png,jpg,jpeg',
            'password'     => 'required|confirmed|min:5',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function create(array $data)
    {
        $user = User::create([
            'uid'        => $data['uid'],
            'type'       => $data['type'],
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'gender'     => $data['gender'],
            'email'      => $data['email'],
            'image'      => $data['img'],
            'password'   => bcrypt($data['password']),
        ]);

        Student::create([
            'id'             => $user->id,
            'batch'          => $data['batch'],
            'section'        => $data['section'],
            'program'        => $data['program'],
            'reg_id'         => $data['reg_id'],
            'birth_date'     => $data['birth_date'],
            'admission_date' => $data['admission_date'],
            'level_id'       => $data['level_id'],
            'user_id'        => $user->id
        ]);

        Registration::where('uu_id', '=', $data['uid'])->delete();

        return $user;
    }


    public function createFaculty(array $data)
    {
        $user = User::create([
            'uid'        => $data['uid'],
            'type'       => $data['type'],
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'gender'     => $data['gender'],
            'email'      => $data['email'],
            'image'      => $data['img'],
            'password'   => bcrypt($data['password']),
        ]);

        Faculty::create([
            'id'           => $user->id,
            'joining_date' => $data['joining_date'],
            'designation'  => $data['designation'],
            'user_id'      => $user->id
        ]);

        Registration::where('uu_id', '=', $data['uid'])->delete();

        return $user;
    }

}
