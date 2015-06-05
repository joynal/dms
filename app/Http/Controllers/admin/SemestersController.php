<?php namespace App\Http\Controllers\Admin;

use Input;
use Redirect;
use App\Models\Semester;
use App\Http\Requests;
use App\Http\Requests\SemesterRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SemestersController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
	public function index()
	{
		$semesters = Semester::all();
        return view('admin.semesters.index', compact('semesters'));
	}


    /**
     * @param SemesterRequest $request
     * @return mixed
     */
	public function store(SemesterRequest $request)
	{
		Semester::create($request->all());

        return Redirect::route('admin.semesters.index')
                            ->with('message', 'Successfully semester created');
	}

    /**
     * @param Semester $semester
     * @return \Illuminate\View\View
     */
	public function show(Semester $semester)
	{
		return view('admin.semesters.show', compact('semester'));
	}

    /**
     * @param Semester $semester
     * @return \Illuminate\View\View
     */
	public function edit(Semester $semester)
	{
		return view('admin.semesters.edit', compact('semester'));
	}

    /**
     * @param Semester $semester
     * @param SemesterRequest $request
     * @return mixed
     */
	public function update(Semester $semester, SemesterRequest $request)
	{
		$input = array_except($request->all(), '_method');
        $semester->update($input);

        return Redirect::route('admin.semesters.index')
                            ->with('message', 'Semester successfully updated!');
	}

    /**
     * @param Semester $semester
     * @return mixed
     * @throws \Exception
     */
	public function destroy(Semester $semester)
	{
		$semester->delete();

        return Redirect::route('admin.semesters.index')
                            ->with('message', 'Successfully semester record deleted.');
	}

}
