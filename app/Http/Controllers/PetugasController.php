<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller {
	
	public function index() {
		$petugass = Petugas::all();
		return view('petugas.list', compact('petugass'));
	}
	
	public function create() {
		return view('petugas.create');
	}
	
	public function store(Request $request) {
		Petugas::create($request->input());
		
		return redirect('dataPetugas');
	}
	
	public function update(Petugas $petugas, Request $request) {
		$petugas->fill($request->input())->save();
		
		if ($request->ajax()) // jika yang request ajax
			return url('dataPetugas');
		else
			return redirect('dataPetugas');
	}
	
	public function destroy(Petugas $petugas, Request $request) {
		$petugas->delete();
		
		if ($request->ajax()) // jika yang request ajax
			return url('dataPetugas');
		else
			return redirect('dataPetugas');
	}

}
