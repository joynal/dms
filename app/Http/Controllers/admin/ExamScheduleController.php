<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Semester;
use App\Models\ExamSchedule;
use App\Models\Coffer;
use App\Models\Level;
use App\Models\User;
use App\Http\Requests\ExamSchedulesRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ExamScheduleController extends Controller {

    /**
     * @param Semester $semester
     * @return \Illuminate\View\View
     */
	public function index(Semester $semester)
	{
		return view('admin.exam-schedules.index', compact('semester'));
	}

    /**
     * @param ExamSchedulesRequest $request
     * @param Semester $semester
     * @return mixed
     */
	public function store(ExamSchedulesRequest $request, Semester $semester)
	{
		$level = Level::whereBatch($request->get('batch'))->whereSection($request->get('section'))->first();

        $coffer = Coffer::whereCourseId($request->get('course_id'))->first();

        $faculty = User::whereUid($request->get('uid'))->first();

        $exam = new ExamSchedule;
        $exam->name = $request->get('name');
        $exam->date = $request->get('date');
        $exam->from = $request->get('from');
        $exam->to = $request->get('to');
        $exam->campus = $request->get('campus');
        $exam->coffer_id = $coffer->id;
        $exam->semester_id = $semester->id;
        $exam->save();

        $exam->levels()->attach($level);
        $exam->faculties()->attach($faculty);

        return Redirect::route('admin.semesters.exam-schedules.index', $semester->id)
                            ->with('message', 'Successfully exam-schedule created.');
	}

    /**
     * @param Semester $semester
     * @param ExamSchedule $schedule
     * @return mixed
     * @throws \Exception
     */
	public function destroy(Semester $semester, ExamSchedule $schedule)
	{
		$schedule->delete();

        return Redirect::route('admin.semesters.exam-schedules.index', $semester->id)
                            ->with('message', 'Successfully exam-schedule record deleted');
	}

}
