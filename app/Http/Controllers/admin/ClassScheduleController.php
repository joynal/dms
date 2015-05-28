<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Semester;
use App\Models\ClassSchedule;
use App\Models\Coffer;
use App\Models\Level;
use App\Http\Requests;
use App\Http\Requests\ClassSchedulesRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ClassScheduleController extends Controller {

    /**
     * @param Semester $semester
     * @return \Illuminate\View\View
     */
	public function index(Semester $semester)
	{
		return view('class-schedules.index', compact('semester'));
	}

    /**
     * @param ClassSchedulesRequest $request
     * @param Semester $semester
     */
	public function store(ClassSchedulesRequest $request, Semester $semester)
	{
        $levelId = Level::whereBatch($request->batch)->whereSection($request->section);
	}


    /**
     * @param Semester $semester
     * @param ClassSchedule $classSchedule
     */
	public function destroy(Semester $semester, ClassSchedule $classSchedule)
	{
		//
	}

}
