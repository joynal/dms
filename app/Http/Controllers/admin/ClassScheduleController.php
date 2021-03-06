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
        return view('admin.class-schedules.index', compact('semester'));
    }

    /**
     * @param ClassSchedulesRequest $request
     * @param Semester $semester
     */
    public function store(ClassSchedulesRequest $request, Semester $semester)
    {
        $coffer = Coffer::whereCourseId($request->get('course_id'))->first();

        $class_schedule = new ClassSchedule;
        $class_schedule->day = $request->get('day');
        $class_schedule->from = $request->get('from');
        $class_schedule->to = $request->get('to');
        $class_schedule->campus = $request->get('campus');
        $class_schedule->coffer_id = $coffer->id;
        $class_schedule->semester_id = $semester->id;
        $class_schedule->save();

        return Redirect::route('admin.semesters.class-schedules.index', $semester->id)
                            ->with('message', 'Successfully class-schedule stored');
    }


    /**
     * @param Semester $semester
     * @param ClassSchedule $classSchedule
     */
    public function destroy(Semester $semester, ClassSchedule $classSchedule)
    {
        $classSchedule->delete();

        return Redirect::route('admin.semesters.class-schedules.index', $semester->id)
                            ->with('message', 'Successfully class-schedule record deleted');
    }

}
