<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tpsampah;
use App\Tpakhir;

class TpembuanganController extends Controller {

    /* resource: index, create, store, show, edit, update, destroy */
    public function index() {
        $tpsampahs = Tpsampah::all();
        $tpakhirs = Tpakhir::all();

		return view('tpembuangan.list', compact('tpsampahs', 'tpakhirs'));
	}
	
	public function create_tps() {
		return view('tpembuangan.createtps');
	}
	
	public function create_tpa() {
		return view('tpembuangan.createtpa');
	}
	
	public function show_tps() {
		$tpsampahs = Tpsampah::all();
		
		return view('tpembuangan.showtps', compact('tpsampahs'));
	}
	
	public function show_tpa() {
		$tpakhirs = Tpakhir::all();
		
		return view('tpembuangan.showtpa', compact('tpakhirs'));
	}
	
	public function store(Request $request) {
		if ($request->get('_poster') == 'tps') { // tambah tps
            Tpsampah::create($request->input());
			
		} else { // tambah tpa
            Tpakhir::create($request->input());
		}
		
		return redirect('dataTP');
	}
	
	public function update(Request $request) {
		if ($request->get('_poster') == 'tps') { // tambah tps
			$tpsampah = Tpsampah::find($request->id);
			$tpsampah->fill($request->input())->save();
			
		} else { // tambah tpa
			$tpakhir = Tpakhir::find($request->id);
			$tpakhir->fill($request->input())->save();
		}
		
		if ($request->ajax())
			return url('dataTP');
		else
			return redirect('dataTP');
	}
	
	public function destroy(Request $request) {
		if ($request->get('_poster') == 'tps') { // tambah tps
			$tpsampah = Tpsampah::find($request->id);
			$tpsampah->delete();
			
		} else { // tambah tpa
			$tpakhir = Tpakhir::find($request->id);
			$tpakhir->delete();
		}
		
		if ($request->ajax())
			return url('dataTP');
		else
			return redirect('dataTP');
	}

}
