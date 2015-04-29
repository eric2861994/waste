<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Jadwal.php;

use Illuminate\Http\Request;

class JadwalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jad = Jadwal::all();
		return view('jadwal.list', compact('jad'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('jadwal.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(JadwalRequest $request)
	{
		Jadwal::create($request->input());
		return redirect()->route('dataJadwal.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Jadwal $jadwal)
	{
		return view('jadwal.show', compact('jadwal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Jadwal $jadwal)
	{
		return view('jadwal.edit', compact('jadwal'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Jadwal $jadwal, JadwalRequest $request)
	{
		$jadwal->update($request->input());
		return redirect()->route('dataJadwal.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Jadwal $jadwal)
	{
		$jadwal->delete();
		return redirect()->route('dataJadwal.index');
	}

}
