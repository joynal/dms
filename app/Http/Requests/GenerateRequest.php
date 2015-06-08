<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class GenerateRequest extends Request {

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
			'type' => 'required',
            'uu_id' => 'required',
            'email' => 'required',
		];
	}

}
