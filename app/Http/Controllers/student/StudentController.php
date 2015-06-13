<?php namespace App\Http\Controllers\Student;

use Auth;
use App\Http\Requests;
use App\Models\Student;
use App\Http\Controllers\Controller;

class StudentController extends Controller {

    public function overview()
    {

        dd(Auth::user()->student->semesterResults);
        $student = Student::find(Auth::user()->id);
        $results = $student->semesterResults;

        return view('students.overviews', compact('results'));
    }

    public function myCourses()
    {

    }

    public function myClassSchedules()
    {

    }

    public function myExamSchedules()
    {

    }

    public function myResults()
    {

    }

}
