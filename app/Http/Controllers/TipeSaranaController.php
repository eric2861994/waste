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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipesarana.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param  TipeSaranaRequest $request
	 * @return Response
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  TipeSarana  $tipesarana
	 * @return Response
	 */
	public function edit(TipeSarana $tipesarana)
    {
		return view('tipesarana.edit', compact('tipesarana'));
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @param  TipeSarana $tipesarana
	 * @param  TipeSaranaRequest $request
	 * @return Response
	 */
	public function update(TipeSarana $tipesarana, TipeSaranaRequest $request)
	{
		$tipesarana->update($request->input());

        return redirect()->route('dataSarana.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  TipeSarana $tipesarana
	 * @return Response
	 */
	public function destroy(TipeSarana $tipesarana)
	{
		$tipesarana->delete();

        return redirect()->route('dataSarana.index');
	}

}
