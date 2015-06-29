<?php namespace App\Http\Controllers\Student;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller {

    public function index()
    {
        return "Welcome to home";
    }

    public function overview()
    {

        $results = Auth::user()->student->semesterResults;

        return view('students.overviews', compact('results'));
    }

    public function myCourses()
    {
        $coffers = Auth::user()->student->coffers;

        return view('students.courses', compact('coffers'));
    }

    public function myCoursesPost()
    {

    }

    public function myClassSchedules()
    {
        $coffers = Auth::user()->student->coffers;

        return view('students.class', compact('coffers'));
    }

    public function myExamSchedules()
    {
        $coffers =  Auth::user()->student->coffers;

        return view('students.exam', compact('coffers'));
    }

    public function myResults()
    {
        $coffers = Auth::user()->student->courseResults;

        return view('students.course_results', compact('coffers'));
    }

}
