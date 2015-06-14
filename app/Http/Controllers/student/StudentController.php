<?php namespace App\Http\Controllers\Student;

use Auth;
use App\Http\Requests;
use App\Models\Student;
use App\Http\Controllers\Controller;

class StudentController extends Controller {

    public function overview()
    {

        $results = Auth::user()->student->semesterResults;

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
