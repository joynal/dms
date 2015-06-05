<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Semester;
use App\Models\Level;
use App\Models\ClassSchedule;
use App\Http\Requests\LevelRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class LevelClassController extends Controller {

    /**
     * @param Semester $semester
     * @param ClassSchedule $schedule
     * @return \Illuminate\View\View
     */
	public function index(Semester $semester, ClassSchedule $schedule)
	{
		return view('admin.level-class.index', compact('semester', 'schedule'));
	}

    /**
     * @param LevelRequest $request
     * @param Semester $semester
     * @param ClassSchedule $schedule
     * @return mixed
     */
	public function store(LevelRequest $request, Semester $semester, ClassSchedule $schedule)
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

        return Redirect::route('admin.semesters.class-schedules.index', [$semester->id])
            ->with('message', 'Level successfully added.');
	}

    /**
     * @param Semester $semester
     * @param ClassSchedule $schedule
     * @param Level $level
     */
	public function destroy(Semester $semester, ClassSchedule $schedule, Level $level)
	{
        $schedule->levels()->detach($level->id);

        return Redirect::route('admin.semesters.class-schedules.index', [$semester->id])
            ->with('message', 'Level successfully deleted.');
	}

}
