<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Semester;
use App\Models\Coffer;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\CofferRequest;
use App\Http\Controllers\Controller;

class CoffersController extends Controller {

    /**
     * @param Semester $semester
     * @return \Illuminate\View\View
     */
    public function index(Semester $semester)
    {
        return view('admin.coffers.index', compact('semester'));
    }

    /**
     * @param CofferRequest $request
     * @param Semester $semester
     * @return mixed
     */
    public function store(CofferRequest $request, Semester $semester)
    {
        $faculty = User::whereUid($request->get('uid'))->first();

        $coffer = new Coffer;
        $coffer->program = $request->get('program');
        $coffer->year = $request->get('year');
        $coffer->course_id = $request->get('course_id');
        $coffer->faculty_id = $faculty->id;
        $coffer->semester_id = $semester->id;
        $coffer->save();

        return Redirect::route('admin.semesters.coffers.index', $semester->id)
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
        $faculty = User::whereUid($request->get('uid'))->first();

        $coffer->program = $request->get('program');
        $coffer->year = $request->get('year');
        $coffer->course_id = $request->get('course_id');
        $coffer->faculty_id = $faculty->id;
        $coffer->semester_id = $semester->id;
        $coffer->save();

        return Redirect::route('admin.semesters.show', $semester->id)
            ->with('message', 'Course offer successfully updated.');
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

        return Redirect::route('admin.semesters.show', $semester->id)
            ->with('message', 'Successfully course offer deleted.');
    }

}
