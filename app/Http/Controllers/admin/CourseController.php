<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Course;
use App\Http\Requests;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;

class CourseController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
	public function index()
	{
		$courses = Course::all();
        return view('admin.courses.index', compact('courses'));
	}

    /**
     * @param CourseRequest $request
     * @return mixed
     */
	public function store(CourseRequest $request)
	{
		Course::create($request->all());

        return Redirect::route('courses.index')
                            ->with('message', 'Successfully course added into the course list');
	}

    /**
     * @param Course $course
     * @return \Illuminate\View\View
     */
	public function show(Course $course)
	{
		return view('admin.courses.show', compact('course'));
	}

    /**
     * @param Course $course
     * @return \Illuminate\View\View
     */
	public function edit(Course $course)
	{
		return view('admin.courses.edit', compact('course'));
	}

    /**
     * @param Course $course
     * @param CourseRequest $request
     * @return mixed
     */
	public function update(Course $course, CourseRequest $request)
	{
		$input = array_except($request->all(), '_method');
        $course->update($input);

        return Redirect::route('courses.index')
                            ->with('message', 'Successfully course updated');
	}

    /**
     * @param Course $course
     * @return mixed
     * @throws \Exception
     */
	public function destroy(Course $course)
	{
		$course->delete();

        return Redirect::route('courses.index')
                            ->with('message', 'Successfully course deleted.');
	}

}
