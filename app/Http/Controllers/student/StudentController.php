<?php namespace App\Http\Controllers\Student;

use Auth;
use App\Models\Semester;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller {

    public function overview()
    {

        $results = Auth::user()->student->semesterResults;

        return view('students.overviews', compact('results'));
    }

    public function myCourses()
    {
        $semester = Semester::latest();
        $enrolled = Auth::user()->student->coffers->whereSemesterId($semester->id);

        dd($enrolled);
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
