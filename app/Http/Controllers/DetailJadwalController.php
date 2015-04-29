<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DetailJadwal;

use Illuminate\Http\Request;

class DetailJadwalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
			$detJad = DetailJadwal::all();

			return view('detailjadwal.list', compact('detJad'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('detailjadwal.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(DetailJadwalRequest $request)
	{
		//
		DetailJadwal::create($request->input());
		return redirect()->route('dataDetailJadwal.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(DetailJadwal $detailjadwal)
	{
		return view('detailjadwal.show', compact('detailjadwal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(DetailJadwal $detailjadwal)
	{
		return view('detailjadwal.edit', compact('detailjadwal'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(DetailJadwal $detailjadwal, DetailJadalRequest $request)
	{
		$detailjadwal->update($request->input());
		return redirect()->route('dataDetailJadwal.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(DetailJadwal $detailjadwal)
	{
		$detailjadwal->delete();
		return redirect()->route('dataDetailJadwal.index');
	}

}
