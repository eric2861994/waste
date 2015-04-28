<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PetugasRequest extends Request {

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
        switch ($this->method()) {
            case 'PUT':
                return [
                    'nip' => 'required|string|min:1|max:255',
                    'name' => 'required|string|min:1|max:255',
                    'role' => 'required|string|min:1|max:255'
                ];
            case 'POST':
                return [
                    'nip' => 'required|string|unique:petugas|min:1|max:255',
                    'name' => 'required|string|min:1|max:255',
                    'role' => 'required|string|min:1|max:255'
                ];
        }
    }

}
