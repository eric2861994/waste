<?php namespace App\Http\Controllers;

use App\EntriTpsampah;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tpsampah;
use App\Tpakhir;
use Carbon\Carbon;
use App\Http\Requests\TpembuanganRequest;
use App\EntriTpakhir;

class TpembuanganController extends Controller {

    public function __construct()
    {
        $this->middleware('three');
    }

    /* resource: index, create, store, show, edit, update, destroy */
    public function index() {
        $tpsampahs = Tpsampah::all();
        $tpakhirs = Tpakhir::all();

		return view('tpembuangan.list', compact('tpsampahs', 'tpakhirs'));
	}

    /**
     * Halaman tambah TPS.
     *
     * @return \Illuminate\View\View
     */
    public function create_tps() {
        return view('tpembuangan.createtps');
    }

    /**
     * Halaman tambah TPA.
     *
     * @return \Illuminate\View\View
     */
    public function create_tpa() {
        return view('tpembuangan.createtpa');
    }

    /**
     * Tambah TPS.
     *
     * @param TpembuanganRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store_tps(TpembuanganRequest $request) {
		Tpsampah::create($request->input());

		return redirect()->route('dataTP.index');
	}

    /**
     * Tambah TPA.
     *
     * @param TpembuanganRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_tpa(TpembuanganRequest $request) {
        Tpakhir::create($request->input());

        return redirect()->route('dataTP.index');
    }

    /**
     * Ubah TPS/TPA. Jika sebelumnya berbeda maka hapus yg sebelumnya.
     * Not a RESTful Update.
     *
     * @param TpembuanganRequest $request
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws \Exception
     */
	public function update(TpembuanganRequest $request)
    {
        $hapus = $request->get('_delete');

        if ($hapus == 'tps')
            Tpsampah::find($request->id)->delete();
        else if ($hapus == 'tpa')
            Tpakhir::find($request->id)->delete();

        $jenis = $request->get('_poster');
        if ($hapus != '') {
            if ($jenis == 'tps')
                $this->store_tps($request);
            else if ($jenis == 'tpa')
                $this->store_tpa($request);
        }
        else if ($jenis == 'tps') {
            $tpsampah = Tpsampah::find($request->id);
            $tpsampah->fill( $request->input() )->save();
        }
        else if ($jenis == 'tpa') {
            $tpakhir = Tpakhir::find($request->id);
            $tpakhir->fill( $request->input() )->save();
        }
		
		if ( $request->ajax() )
			return route('dataTP.index');
		else
			return redirect()->route('dataTP.index');
	}

    /**
     * Hapus TPS.
     *
     * @param Request $request
     * @param Tpsampah $tpsampah
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws \Exception
     */
	public function destroy_tps(Request $request, Tpsampah $tpsampah) {
        $tpsampah->delete();

		if ($request->ajax())
			return route('dataTP.index');
		else
			return redirect()->route('dataTP.index');
	}

    /**
     * Hapus TPA.
     *
     * @param Request $request
     * @param Tpakhir $tpakhir
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws \Exception
     */
    public function destroy_tpa(Request $request, Tpakhir $tpakhir) {
        $tpakhir->delete();

        if ($request->ajax())
            return route('dataTP.index');
        else
            return redirect()->route('dataTP.index');
    }

    /**
     * Tampilkan volume sampah saat ini pada TPS.
     *
     * @return \Illuminate\View\View
     */
    public function summary() {
        $tpsampahs = Tpsampah::all();
        $tpakhirs = Tpakhir::all();

        return view('tpembuangan.summary', compact('tpsampahs', 'tpakhirs'));
    }

    public function detailed() {
        $cLastWeek = Carbon::now()->subDays(7);
        $entry_tps = EntriTpsampah::latest()->where('created_at', '>', $cLastWeek)->get();
        $entry_tpa = EntriTpakhir::latest()->where('created_at', '>', $cLastWeek)->get();

        return view('tpembuangan.detailed', compact('entry_tps', 'entry_tpa'));
    }

    /**
     * Menampilkan detail entri untuk tps.
     *
     * @param Tpsampah $tpsampah
     * @return \Illuminate\View\View
     */
    public function show_tps(Tpsampah $tpsampah) {
        $cLastWeek = Carbon::now()->subDays(7);

        $entry_tps = $tpsampah->entries()->latest()->where('created_at', '>', $cLastWeek)->get();
        $entry_tpa = $tpsampah->entrytpas()->latest()->where('created_at', '>', $cLastWeek)->get();

        return view('tpembuangan.show_tps', compact('tpsampah', 'entry_tps', 'entry_tpa'));
    }

    public function show_tpa(Tpakhir $tpakhir) {
        $cLastWeek = Carbon::now()->subDays(7);

        $entry_tpa = $tpakhir->entry()->latest()->where('created_at', '>', $cLastWeek)->get();

        return view('tpembuangan.show_tpa', compact('tpakhir', 'entry_tpa'));
    }

}
