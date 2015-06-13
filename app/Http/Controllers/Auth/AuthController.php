<?php namespace App\Http\Controllers\Auth;

use Redirect;
use App\Models\Registration;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = 'admin';

    /**
     * @param Guard $auth
     * @param Registrar $registrar
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            if ($this->auth->user()->type === 'admin')
            {
                return redirect()
                    ->intended('admin')
                    ->with('message', 'Successfully admin logged in.');
            }

            if ($this->auth->user()->type === 'student')
            {
                return redirect()
                    ->intended('student')
                    ->with('message', 'Successfully logged in.');
            }

            if ($this->auth->user()->type === 'faculty')
            {
                return redirect()
                    ->intended('faculty')
                    ->with('message', 'Successfully logged in.');
            }
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }


    public function getRegister($confirmation)
    {
        $registration = Registration::whereConfirmation($confirmation)->firstOrFail();

        return view('auth.register', compact('registration'));
    }

    /**
     * @param Request $request
     * @param $confirmation
     * @return Redirect
     * @register student and faculty
     */
    public function postRegister(Request $request, $confirmation)
    {
        $registration = Registration::whereConfirmation($confirmation)->first();

        if ($registration->type == "student")
        {
            $request['uid'] = $registration->uu_id;

            $validator = $this->registrar->validator($request->all());
            if ($validator->fails())
            {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = str_random(20) . '.' . $extension;
            $image->move(base_path() . '/public/fileStorage/image/', $imageName);
            $request['img'] = $imageName;

            $request['type'] = $registration->type;
            $request['program'] = $registration->program;

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
            $request['level_id'] = $level->id;
            $this->auth->login($this->registrar->create($request->all()));

            return redirect()
                ->route('student')
                ->with('message', 'Successfully student account created.');
        } else
        {
            $request['uid'] = $registration->uu_id;

            $validator = $this->registrar->validatorFaculty($request->all());
            if ($validator->fails())
            {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = str_random(20) . '.' . $extension;
            $image->move(base_path() . '/public/fileStorage/image/', $imageName);
            $request['img'] = $imageName;
            $request['type'] = $registration->type;

            $this->auth->login($this->registrar->createFaculty($request->all()));

            return redirect()
                ->route('faculty')
                ->with('message', 'Successfully faculty account created.');
        }

        return redirect($this->redirectPath());
    }
}
