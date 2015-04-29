<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Sarana;
use App\TipeSarana;
use Illuminate\Queue\RedisQueue;

class SaranaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $saranas = Sarana::all();

        return view('sarana.list', compact('saranas'));
	}

    /**
     * Halaman Tambah Sarana.
     *
     * @return \Illuminate\View\View
     */
	public function create()
	{
        $tipesaranas = TipeSarana::all();

		return view('sarana.create', compact('tipesaranas'));
	}

    /**
     * Tambah Sarana.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		Sarana::create($request->input());

        return redirect()->route('sarana.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

    /**
     * Halaman ubah Sarana.
     *
     * @param Sarana $sarana
     * @return \Illuminate\View\View
     */
	public function edit(Sarana $sarana)
	{
        $tipesaranas = TipeSarana::all();

		return view('sarana.edit', compact('sarana', 'tipesaranas'));
	}

    /**
     * Ubah Sarana.
     *
     * @param Sarana $sarana
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Sarana $sarana, Request $request)
	{
		$sarana->update($request->input());

        return redirect()->route('sarana.index');
	}

    /**
     * Hapus sarana.
     * @param Sarana $sarana
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
	public function destroy(Sarana $sarana)
	{
		$sarana->delete();

        return redirect()->route('sarana.index');
	}

}
