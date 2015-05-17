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
        $this->validate($request, [
            'type_id' => 'required|integer|exists:ppl_waste_tipe_saranas,id',
            'plate_number' => 'required|string|unique:ppl_waste_saranas,plate_number|max:16'
        ]);

		$sarana = Sarana::create($request->input());

        return redirect()->route('sarana.index');
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
        $this->validate($request, [
            'type_id' => 'required|integer|exists:ppl_waste_tipe_saranas,id',
            'plate_number' => 'required|string|unique:ppl_waste_saranas,plate_number,'.$sarana->id.'|max:16'
        ]);

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
