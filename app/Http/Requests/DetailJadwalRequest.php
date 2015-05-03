<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DetailJadwalRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'start_time' => 'required|string|min:1|max:6',
            'end_time' => 'required|string|min:1|max:6',
            'description' => 'string|max:255'
		];
	}

}
