<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\EntriTpsampah;
use App\EntriTpakhir;
use App\Tpsampah;
use App\Tpakhir;

class EntriController extends Controller {

	private $etps, $etpa, $tpa, $tps;
	
	public function __construct(Tpsampah $tpsampah, Tpakhir $tpakhir, EntriTpsampah $entritpsampah, EntriTpakhir $entritpakhir) {
		$this->etps = $entritpsampah;
		$this->etpa = $entritpakhir;
		$this->tps = $tpsampah;
		$this->tpa = $tpakhir;
	}
	
	public function create() {
		$tpsampahs = $this->tps->get();
		
		return view('entri.create', compact('tpsampahs'));
	}
	
	public function store(Request $request) {
		$entritpsampah = new EntriTpsampah();
		
		$entritpsampah->fill($request->input())->save();
		
		return redirect('entry');
	}
	
	public function create_etps() {
	}

}
