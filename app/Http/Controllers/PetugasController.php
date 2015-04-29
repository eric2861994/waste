<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PetugasRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Petugas;
use App\User;

class PetugasController extends Controller {
	
	public function index() {
		$petugass = Petugas::all();

		return view('petugas.list', compact('petugass'));
	}

    /**
     * Halaman tambah petugas.
     *
     * @return \Illuminate\View\View
     */
	public function create() {
		return view('petugas.create');
	}

    /**
     * Tambah Petugas.
     *
     * @param PetugasRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(PetugasRequest $request) {
        $user = User::create($request->input());
        $user->petugas()->create($request->input());
		
		return redirect()->route('dataPetugas.index');
	}

    /**
     * Ubah petugas.
     *
     * @param Petugas $petugas
     * @param PetugasRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
	public function update(Petugas $petugas, PetugasRequest $request) {
		$petugas->fill($request->input())->save();
		
		if ($request->ajax()) // jika yang request ajax
			return route('dataPetugas.index');
		else
			return redirect()->route('dataPetugas.index');
	}

    /**
     * Hapus petugas.
     *
     * @param Petugas $petugas
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     * @throws \Exception
     */
	public function destroy(Petugas $petugas, Request $request) {
		$petugas->delete();
		
		if ($request->ajax()) // jika yang request ajax
			return route('dataPetugas.index');
		else
			return redirect()->route('dataPetugas.index');
	}

}
