<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExamSchedulesRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'program'   => 'required',
            'batch'     => 'required',
            'course_id' => 'required',
            'uid'       => 'required',
            'name'      => 'required',
            'date'      => 'required',
            'from'      => 'required',
            'to'        => 'required',
            'campus'    => 'required'
        ];
    }

}
