<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tpsampah;
use App\Tpakhir;
use App\Http\Requests\TpembuanganRequest;

class Sarana extends Controller {

    /* resource: index, create, store, show, edit, update, destroy */
    public function index() {

		return view('sarana.list');
	}
	

}
