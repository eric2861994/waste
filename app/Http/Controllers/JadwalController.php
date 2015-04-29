<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Jadwal;
use App\Tpsampah;
use Carbon\Carbon;

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
//        hitung volume sampah rata - rata selama seminggu untuk setiap TPS
        $cNow = Carbon::now();

        $cLastWeek = $cNow->subDays(7);
        $tpsampahs = Tpsampah::all();

        $vTPS = [];
        foreach ($tpsampahs as $tpsampah) {
            $entries = $tpsampah->entries()->where('created_at', '>', $cLastWeek)->get();
            $vTotal = 0;
            $count = 0;
            foreach ($entries as $entry) {
                $vTotal += $entry->volume;
                $count += 1;
            }
            if ($count > 1)
                $vAvg = $vTotal / $count;
            else
                $vAvg = $vTotal;
            $vTPS[] = ['id' => $tpsampah->id, 'v' => $vAvg, 'flag' => false];
        }

//        dapatkan volume dari setiap sarana pengangkut sampah
        $dSarana = [];
        $saranas = Sarana::all();
        foreach ($saranas as $sarana) {
            $dSarana[] = ['id' => $sarana->id, 'v' => $sarana->tipeSarana->volume];
        }

        $vTPS = array_values(array_sort($vTPS, function ($value) {
            return $value['v'];
        }));

        $dSarana = array_values(array_sort($dSarana, function ($value) {
            return $value['v'];
        }));

        /* Greedy Algorithm:
         * tahap 1: assign dari sarana dengan volume terkecil,
         * sarana tersebut diassign ke tps yang sisa volumenya bisa ditampung, namun terbesar.
         * jika tidak ada, maka sarana tersebut untuk sementara tidak dijadwalkan.
         *
         * Kemudian lanjtukan ke tahap 2
         */
//        vTPS = {id:id TPS, v: volume rata-rata selama seminggu (v^3), flag: true jika sudah ada sarana} terurut membesar berdasarkan v
//        dSarana = {id: id Sarana, v: volume sarana pengangkut sampah (v^3), tps: -1 jika belum ada tps} terurut membesar berdasarkan v

        $greedy = false;
        $i = 0; $lTPS = count($vTPS);
        $j = 0; $lSarana = count($dSarana);
            while ($i < $lTPS && $j < $lSarana) {
            if ($vTPS[$i]['v'] < $lSarana[$j]['v']) {
                /* coba ambil lebih */
                $i++;
                $greedy = true;
            }

            else if ($vTPS[$i]['v'] == $dSarana[$j]['v']) {
                /* biasanya tidak boleh, tapi kali ini langsung ambil aja */
                $vTPS[$i]['flag'] = true;
                $dSarana[$j]['tps'] = $i;
                $i++;
                $j++;
                $greedy = false;

            } else {
                /* volume tps lebih besar, mencoba ngambil yang sebelumnya */
                if ($greedy) {
                    /* ambil yangs sebelumnya */
                    $vTPS[$i-1]['flag'] = true;
                    $dSarana[$j]['tps'] = $i;
                    $i++;
                    $j++;
                    $greedy = false;
                }
                else {
                    /* gak bisa ambil */
                    $j++;
                }
            }
        }

//        TPS yang belum sepenuhnya terangkut
        $rTPS = array_where($vTPS, function($key, $value)
        {
            return !$value['flag'];
        });

        /* tahap 2: memilih sarana dengan kapasitas terbesar,
         * lansgung menggunakannya untuk TPS dengan sisa sampah terbanyak.
         */
        $j = $lSarana-1;
        while ($j > 0) {
            if ($dSarana['tps'] != -1)
//                sudah terpilih
                $j--;

            else {
                $last = count($rTPS)-1;
                if ($last != -1) {
//                    masih ada elemen
                    $dSarana['tps'] = $last;
                    $sisa = $rTPS[$last]['v'] - $dSarana[$j]['v'];
                    if ($sisa > 0) {
                        /* insert ke tempat yang tepat */
                        $dSarana[$j]['v'] = $sisa;
                        $toMove = $dSarana[$j];
                        while ($i > 0 && $vTPS[$i-1]['v'] > $sisa) {
                            $vTPS[$i] = $vTPS[$i-1];
                        }
                        $vTPS[$i] = $toMove;
                    }
                    else {
                        /* hilangkan dari rTPS */
                        unset($rTPS[$last]);
                    }
                    $j--;
                }
                else
//                    short circuit
                    break;
            }
        }

        /* End of Greedy Algorithm,
         * F.S. : dSarana[i][tps] akan berisi indeks tps yang akan dilayani oleh sarana.
         *        jika nilai -1 maka sarana nganggur.
         */

//        bikin jadwal sarana dengan diketahuinya dSarana

    }

}
