<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Jadwal;
use App\DetailJadwal;
use App\Tpsampah;
use App\Sarana;
use Carbon\Carbon;

class JadwalController extends Controller
{

    private $EPSILON = 0.000001;

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
     * Tampilkan jadwal
     *
     * @param Jadwal $jadwal
     * @return \Illuminate\View\View
     */
    public function show(Jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    public function totalRecallSarana() {
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

        $bTPS = $vTPS;

//        dapatkan volume dari setiap sarana pengangkut sampah
        $dSarana = [];
        $saranas = Sarana::all();
        foreach ($saranas as $sarana) {
            $dSarana[] = ['id' => $sarana->id, 'v' => $sarana->tipeSarana->volume, 'tps' => -1];
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
                $dSarana[$j]['tps'] = $vTPS[$i]['id'];
                $i++;
                $j++;
                $greedy = false;

            } else {
                /* volume tps lebih besar, mencoba ngambil yang sebelumnya */
                if ($greedy) {
                    /* ambil yangs sebelumnya */
                    $vTPS[$i-1]['flag'] = true;
                    $dSarana[$j]['tps'] = $vTPS[$i]['id'];
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
        while ($j >= 0) {
            if ($dSarana[$j]['tps'] != -1)
//                sudah terpilih
                $j--;

            else {
                $last = count($rTPS)-1;
                if ($last != -1) {
//                    masih ada elemen
                    $dSarana[$j]['tps'] = $rTPS[$last]['id'];
                    $sisa = $rTPS[$last]['v'] - $dSarana[$j]['v'];
                    if ($sisa > 0) {
                        /* insert ke tempat yang tepat */
                        $rTPS[$last]['v'] = $sisa;
                        $toMove = $rTPS[$last];
                        $i = $last;
                        while ($i > 0 && $rTPS[$i-1]['v'] > $sisa) {
                            $rTPS[$i] = $rTPS[$i-1];
                            $i--;
                        }
                        $rTPS[$i] = $toMove;
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
//        we only care about tps which has transport
        $cIDTPS = [];
        foreach ($dSarana as $sarana) {
            $a = $sarana['tps'];
            if (!in_array($a, $cIDTPS))
                $cIDTPS[] = $a;
        }

        $cTPS = [];
        foreach ($bTPS as $tps) {
            if (in_array($tps['id'], $cIDTPS))
                $cTPS[] = $tps;
        }

//        degree berisi derajat dari kendaraan
        $degree = [];
        $carryOn = true;
        $iteration = 0;
        while ($carryOn) {
            foreach ($dSarana as $sarana) {
                $idTPS = $sarana['tps'];
                $idSarana = $sarana['id'];

                if ($idTPS != -1) {
                    $idx = $this->findIndex($idTPS, $cTPS);

                    $volumeAwal = $cTPS[$idx]['v'];
                    if ($volumeAwal < $this->EPSILON)
                        continue;

                    $sisaVolume = $volumeAwal - $sarana['v'];
                    $cTPS[$idx]['v'] = $sisaVolume;

                    if (array_key_exists($idSarana, $degree))
                        $degree[$idSarana]++;
                    else
                        $degree[$idSarana] = 1;
                }
            }

//            if ($iteration == 5)
//                dd($cTPS);

            $carryOn = false;
            foreach($cTPS as $tps) {
                if ($tps['v'] > $this->EPSILON) {
                    $carryOn = true;
                    break;
                }
            }
            $iteration++;
        }

//        tpsDegree (idTPS, degree) => jumlah berisi informasi brp banyak kendaraan yang memiliki derajat degree pada
//        TPS dengan id idTPS
        $tpsDegree = [];
        foreach ($degree as $idSaranaa => $derajat) {
            $idx = $this->findIndex($idSaranaa, $dSarana);
            $key = $dSarana[$idx]['tps'] * 1000 + $derajat;
            if (array_key_exists($key, $tpsDegree))
                $tpsDegree[$key]++;
            else
                $tpsDegree[$key] = 1;
        }

        return [
            'tpsDegree' => $tpsDegree,
            'dSarana' => $dSarana,
            'degree' => $degree,
            'bTPS' => $bTPS
        ];
    }


    public function jadwalSarana()
    {
        $totalRecall = $this->totalRecallSarana();
        $tpsDegree = $totalRecall['tpsDegree'];
        $dSarana = $totalRecall['dSarana'];
        $degree = $totalRecall['degree'];

        foreach ($tpsDegree as $key => $val) {
            $summary = 'jadwal untuk kendaraan di ';
            $idTPS = floor($key / 1000);
            $namaTPS = Tpsampah::find($idTPS)->name;
            $summary .= $namaTPS;
            $derajatJadwal = $key - $idTPS*1000;

            $jadwal = Jadwal::create(['summary' => $summary]);
            for ($i = 0; $i < $derajatJadwal; $i++) {
                $mulai = $i*4;
                $akhir = $mulai + 4;

                if ($mulai < 10)
                    $smulai = '0' . $mulai . '0000';
                else
                    $smulai = $mulai . '0000';

                if ($akhir < 10)
                    $sakhir = '0'. $akhir . '0000';
                else
                    $sakhir = $akhir . '0000';

                $description = 'Mengangkut sampah dari ' . $namaTPS . ' ke TPA';


                $detailJadwal = new DetailJadwal(['start_time' => $smulai, 'end_time' => $sakhir,
                    'description' => $description]);

                $jadwal->details()->save($detailJadwal);
            }

            foreach ($dSarana as $sarana) {
                $idSarana = $sarana['id'];
                if ($sarana['tps'] == $idTPS) {
                    $derajat = $degree[$idSarana];
                    if ($derajat == $derajatJadwal) {
                        $daSarana = Sarana::find($idSarana);
                        $daSarana->update(['schedule_id' => $jadwal->id]);
                    }
                }
            }
        }
    }

    public function hitungSarana() {
        $totalRecall = $this->totalRecallSarana();
        $bTPS = $totalRecall['bTPS'];
        $dSarana = $totalRecall['dSarana'];
        $degree = $totalRecall['degree'];


        foreach ($dSarana as $sarana) {
            $idTPS = $sarana['tps'];
            $derajat = $degree[$sarana['id']];
            $sisa = $bTPS[$idTPS]['v'] - $derajat * $sarana['v'];
            $bTPS[$idTPS]['v'] = $sisa;
        }

        $totalSisa = 0;
        foreach ($bTPS as $tps) {
            $totalSisa += $tps['v'];
        }

        dd($totalSisa);
    }

    public function jadwalPetugas() {


    }

    /**
     * Return the index of an array where the id matches.
     *
     * @param $id: the id to find
     * @param $list: the array which entry contains 'id' as key
     * @return int|string
     */
    private function findIndex($id, $list) {
        foreach ($list as $idx => $entry) {
            if ($entry['id'] == $id) {
                return $idx;
            }
        }
        return -1;
    }

}
