<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Jadwal;
use Carbon\Carbon;
use App\Tpsampah;

class JadwalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwal.list', compact('jadwals'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    public function jadwalSarana()
    {
//        hitung volume sampah rata - rata selama seminggu
        $cNow = Carbon::now();

        $cLastWeek = $cNow->subDays(7);
        $tpsampahs = Tpsampah::all();

        $vTPS = [];
        foreach ($tpsampahs as $tpsampah) {
            $entries = $tpsampah->entries()->where('created_at', '>', $cLastWeek)->get();
            $vTotal = 0;
            foreach ($entries as $entry) {
                $vTotal += $entry->volume;
            }
            $vTPS[] = ['id' => $tpsampah->id, 'v' => $vTotal];
        }

        dd($vTPS);
    }

}
