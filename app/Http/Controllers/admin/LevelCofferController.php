<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Coffer;
use App\Models\Level;
use App\Models\Semester;
use App\Models\Student;
use App\Http\Requests;
use App\Http\Requests\LevelRequest;
use App\Http\Controllers\Controller;

class LevelCofferController extends Controller {

    /**
     * @param Semester $semester
     * @param Coffer $coffer
     * @return \Illuminate\View\View
     */
    public function index(Semester $semester, Coffer $coffer){
        return view('admin.levels.index', compact('semester', 'coffer'));
    }
    /**
     * @param LevelRequest $request
     * @param Semester $semester
     * @param Coffer $coffer
     * @return mixed
     */
    public function store(LevelRequest $request, Semester $semester, Coffer $coffer)
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

        $coffer->levels()->attach($level);

        $students = Student::whereLevelId($level->id)->get();
        foreach ($students as $student)
        {
            $coffer->students()->attach($student->id, ['status' => 'unenrolled']);
        }

        return Redirect::route('admin.semesters.coffers.index', [$semester->id])
            ->with('message', 'Level successfully added.');
    }


    /**
     * @param Semester $semester
     * @param Coffer $coffer
     * @param Level $level
     * @return mixed
     */
    public function destroy(Semester $semester, Coffer $coffer, Level $level)
    {
        $coffer->levels()->detach($level->id);

        $students = Student::whereLevelId($level->id)->get();
        foreach ($students as $student)
        {
            $coffer->students()->detach($student->id);
        }

        return Redirect::route('admin.semesters.coffers.index', [$semester->id])
            ->with('message', 'Level successfully deleted.');
    }

}
