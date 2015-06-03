<?php namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Redirect;
use App\Models\Semester;
use App\Models\Coffer;
use App\Models\Level;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\CofferRequest;
use App\Http\Controllers\Controller;

class CoffersController extends Controller {

    /**
     * @param Semester $semester
     * @return \Illuminate\View\View
     */
    public function index(Semester $semester){
        return view('admin.coffers.index', compact('semester'));
    }

    /**
     * @param CofferRequest $request
     * @param Semester $semester
     * @return mixed
     */
	public function store(CofferRequest $request, Semester $semester)
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

        $faculty = User::whereUid($request->get('uid'))->first();

        $coffer = new Coffer;
        $coffer->program = $request->get('program');
        $coffer->year = $request->get('year');
        $coffer->course_id = $request->get('course_id');
        $coffer->faculty_id = $faculty->id;
        $coffer->semester_id = $semester->id;
        $coffer->save();

        $coffer->levels()->attach($level);

        $students = Student::whereLevelId($level->id)->get();
        foreach($students as $student){
            $coffer->students()->attach($student->id,['status' => 'unenrolled']);
        }

        return Redirect::route('semesters.show', $semester->id)
                            ->with('message', 'Course offer successfully added.');
	}

    /**
     * @param Semester $semester
     * @param Coffer $coffer
     * @return \Illuminate\View\View
     */
	public function edit(Semester $semester, Coffer $coffer)
	{
		return view('admin.coffers.edit', compact('semester', 'coffer'));
	}

    /**
     * @param CofferRequest $request
     * @param Semester $semester
     * @param Coffer $coffer
     * @return mixed
     */
	public function update(CofferRequest $request, Semester $semester, Coffer $coffer)
	{

	}

    /**
     * @param Semester $semester
     * @param Coffer $coffer
     * @return mixed
     * @throws \Exception
     */
	public function destroy(Semester $semester, Coffer $coffer)
	{
		$coffer->delete();

        return Redirect::route('semesters.show', $semester->id)
                            ->with('message', 'Successfully course offer deleted.');
	}

}
