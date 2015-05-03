<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\TipeSarana;
use App\Http\Requests\TipeSaranaRequest;

class TipeSaranaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tipes = TipeSarana::all();

		return view('tipesarana.index', compact('tipes'));
	}

    /**
     * Halaman Tambah Tipe Sarana.
     *
     * @return \Illuminate\View\View
     */
	public function create()
	{
		return view('tipesarana.create');
	}

    /**
     * Tambah Tipe Sarana.
     *
     * @param TipeSaranaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(TipeSaranaRequest $request)
	{
		TipeSarana::create($request->input());

        return redirect()->route('dataSarana.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  TipeSarana $tipesarana
	 * @return Response
	 */
	public function show(TipeSarana $tipesarana)
	{
		return view('tipesarana.show', compact('tipesarana'));
	}

    /**
     * Halaman ubah Tipe Sarana.
     *
     * @param TipeSarana $tipesarana
     * @return \Illuminate\View\View
     */
	public function edit(TipeSarana $tipesarana)
    {
		return view('tipesarana.edit', compact('tipesarana'));
	}

    /**
     * Ubah Tipe Sarana.
     *
     * @param TipeSarana $tipesarana
     * @param TipeSaranaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(TipeSarana $tipesarana, TipeSaranaRequest $request)
	{
		$tipesarana->update($request->input());

        return redirect()->route('dataSarana.index');
	}

    /**
     * Hapus Tipe Sarana.
     *
     * @param TipeSarana $tipesarana
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
	public function destroy(TipeSarana $tipesarana)
	{
		$tipesarana->delete();

        return redirect()->route('dataSarana.index');
	}

}
