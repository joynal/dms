<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Semester;
use App\Models\Coffer;
use App\Http\Requests;
use App\Http\Requests\CofferRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CoffersController extends Controller {

    /**
     * @param CofferRequest $request
     * @param Semester $semester
     * @return mixed
     */
	public function store(CofferRequest $request, Semester $semester)
	{
		$input = $request->all();
        $input['semester_id'] = $semester->id;
        Coffer::create($input);

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
		$coffer->update($request->all());

        return Redirect::route('semesters.show', $semester->id)
                            ->with('message', 'Successfully course offer updated.');
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
