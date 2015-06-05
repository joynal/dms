<?php namespace App\Http\Controllers\Admin;


use Redirect;
use App\Models\Semester;
use App\Http\Requests;
use App\Models\ExamSchedule;
use App\Models\User;
use App\Models\Faculty;
use App\Http\Requests\FaqsExamRequest;
use App\Http\Controllers\Controller;

class FaqsExamController extends Controller {

    /**
     * @param Semester $semester
     * @param ExamSchedule $schedule
     * @return \Illuminate\View\View
     */
	public function index(Semester $semester, ExamSchedule $schedule)
	{
		return view('admin.faqs-exam.index', compact('semester', 'schedule'));
	}

    /**
     * @param FaqsExamRequest $request
     * @param Semester $semester
     * @param ExamSchedule $schedule
     * @return mixed
     */
	public function store(FaqsExamRequest $request, Semester $semester, ExamSchedule $schedule)
	{
        $faculty = User::whereUid($request->get('uid'))->first();

        $schedule->faculties()->attach($faculty);

        return Redirect::route('admin.semesters.exam-schedules.index', [$semester->id])
            ->with('message', 'Faculty successfully added.');
	}

    /**
     * @param Semester $semester
     * @param ExamSchedule $schedule
     * @param Faculty $faculty
     * @return mixed
     */
	public function destroy(Semester $semester, ExamSchedule $schedule, Faculty $faculty)
	{
		$schedule->faculties()->detach($faculty->id);

        return Redirect::route('admin.semesters.exam-schedules.index', [$semester->id])
            ->with('message', 'Faculty successfully deleted.');
	}

}
