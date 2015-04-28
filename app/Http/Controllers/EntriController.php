<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\EntriTpsampah;
use App\EntriTpakhir;
use App\Tpsampah;
use App\Tpakhir;

class EntriController extends Controller
{

    public function create_tps()
    {
        $tpsampahs = TPsampah::all();

        return view('entri.create_tps', compact('tpsampahs'));
    }

    public function store_tps(Request $request)
    {
        EntriTpsampah::create($request->input());

        return redirect()->route('entry.create_tps');
    }
}
