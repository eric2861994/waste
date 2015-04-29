<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DetailJadwal;
use App\Http\Requests\DetailJadwalRequest;
use Illuminate\Http\Request;

class DetailJadwalController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(DetailJadwalRequest $request)
	{
		DetailJadwal::create($request->input());

		return redirect()->route('jadwal.index');
	}
}
