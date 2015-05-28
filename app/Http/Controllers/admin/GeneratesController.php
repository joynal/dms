<?php namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Registration;
use App\Http\Requests;
use App\Http\Requests\GenerateRequest;
use App\Http\Requests\FieldGeneratorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneratesController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bsc_students = Registration::whereProgram('bsc')->get();
        $msc_students = Registration::whereProgram('msc')->get();

        return view('admin.generates.index', compact('bsc_students', 'msc_students'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.generates.create');
    }


    /**
     * @param GenerateRequest $request
     * @return mixed
     */
    public function store(GenerateRequest $request)
    {
        $input = $request->all();
        $input['confirmation'] = str_random(60);
        Registration::create($input);

        return Redirect::route('admin.generates.index')->with('message', 'Registration added!');
    }


    /**
     * @param Registration $registration
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return Redirect::route('admin.generates.index')->with('message', 'Deleted!');
    }

}
