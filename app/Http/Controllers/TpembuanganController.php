<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tpsampah;
use App\Tpakhir;

class TpembuanganController extends Controller {
	private $tpsampah, $tpakhir;
	
	public function __construct(Tpsampah $tpsampah, Tpakhir $tpakhir) {
		$this->tpsampah = $tpsampah;
		$this->tpakhir = $tpakhir;
	}

	public function index() {
		$tpsampahs = $this->tpsampah->get();
		$tpakhirs = $this->tpakhir->get();
		
		return view('tpembuangan.list', compact('tpsampahs', 'tpakhirs'));
	}
	
	public function create_tps() {
		return view('tpembuangan.createtps');
	}
	
	public function create_tpa() {
		return view('tpembuangan.createtpa');
	}
	
	public function store(Request $request) {
		if ($request->get('_poster') == 'tps') { // tambah tps
			$tpsampah = new Tpsampah();
			$tpsampah->fill($request->input())->save();
			
		} else { // tambah tpa
			$tpakhir = new Tpakhir();
			$tpakhir->fill($request->input())->save();
		}
		
		return redirect('dataTP');
	}

}
