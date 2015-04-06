<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tpakhir;

class TpakhirsController extends Controller {
	private $tpakhir;
	
	public function __construct(Tpakhir $tpakhir) {
		$this->tpakhir = $tpakhir;
	}

	public function index() {
		$tpakhirs = $this->tpakhir->get();
		
		return view('tpakhir.list', compact('tpakhirs'));
	}

}
