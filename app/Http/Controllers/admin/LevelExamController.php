<?php namespace App\Http\Controllers\Admin;

use App\Models\ClassSchedule;
use Redirect;
use App\Models\Semester;
use App\Models\Level;
use App\Models\ExamSchedule;
use App\Http\Requests\LevelRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class LevelExamController extends Controller {

    /**
     * @param Semester $semester
     * @param ExamSchedule $schedule
     * @return \Illuminate\View\View
     */
	public function index(Semester $semester, ExamSchedule $schedule)
	{
		return view('admin.level-exam.index', compact('semester', 'schedule'));
	}


    /**
     * @param LevelRequest $request
     * @param Semester $semester
     * @param ExamSchedule $schedule
     * @return mixed
     */
	public function store(LevelRequest $request, Semester $semester, ExamSchedule $schedule)
	{
        if (Level::whereBatch($request->get('batch'))->whereSection($request->get('section'))->first())
        {
            $level = Level::whereBatch($request->get('batch'))->whereSection($request->get('section'))->first();
        } else
        {
            $level = new Level;
            $level->batch = $request->get('batch');
            $level->section = $request->get('section');
            $level->save();
        }

        $schedule->levels()->attach($level);

        return Redirect::route('semesters.exam-schedules.index', [$semester->id])
            ->with('message', 'Level successfully added.');
	}

    /**
     * @param Semester $semester
     * @param ExamSchedule $schedule
     * @param Level $level
     */
	public function destroy(Semester $semester, ExamSchedule $schedule, Level $level)
	{
		$schedule->levels()->detach($level->id);

        return Redirect::route('semesters.exam-schedules.index', [$semester->id])
            ->with('message', 'Level successfully deleted.');
	}

}
