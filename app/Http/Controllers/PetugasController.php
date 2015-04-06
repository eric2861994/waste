<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller {
	
	private $petugas;
	
	public function __construct(Petugas $petugas) {
		$this->petugas = $petugas;
	}

	public function index() {
		$petugass = $this->petugas->get();
		return view('petugas.list', compact('petugass'));
	}
	
	public function create() {
		return view('petugas.create');
	}
	
	public function store(Request $request) {
		$petugas = new Petugas();
		$petugas->fill($request->input())->save();
		
		return redirect('dataPetugas');
	}
	
	public function update(Petugas $petugas, Request $request) {
		$petugas->fill($request->input())->save();
		
		return url('dataPetugas');
	}

}
