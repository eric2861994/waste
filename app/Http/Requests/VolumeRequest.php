<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VolumeRequest extends Request {

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
			'tps_id' => 'required|integer|exists:ppl_waste_tpsampahs,id',
            'volume' => 'required|numeric|min:0|max:1000'
		];
	}

}
