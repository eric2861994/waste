<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TpembuanganRequest extends Request {

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
            'name' => 'required|string|min:1|max:255',
			'location' => 'required|string|min:1|max:255'
		];
	}

}
