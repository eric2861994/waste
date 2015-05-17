<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Jadwal;
use App\DetailJadwal;
use App\Tpsampah;
use App\Sarana;
use App\User;
use App\UserJadwal;
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
//        F.S.: vTPS, bTPS adalah rata-rata volume sampah untuk setiap tps

//        dapatkan volume dari setiap sarana pengangkut sampah
        $dSarana = [];
        $saranas = Sarana::all();
        foreach ($saranas as $sarana) {
            $dSarana[] = ['id' => $sarana->id, 'v' => $sarana->tipeSarana->volume, 'tps' => -1];
        }
//        F.S.: dSarana berisi volume setiap truk dan tps dimana dia bekerja

        $vTPS = array_values(array_sort($vTPS, function ($value) {
            return $value['v'];
        }));

        $dSarana = array_values(array_sort($dSarana, function ($value) {
            return $value['v'];
        }));
//        F.S.:
//            vTPS mengandung tps yang terurut berdasarkan volume sampah rata-rata
//            dSarana mengandung kendaraan yang terurut berdasarkna volume sampah

        $MAX_SERVICE = 6;
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
            if ($vTPS[$i]['v'] < $lSarana[$j]['v'] * $MAX_SERVICE) {
                /* coba ambil lebih */
                $i++;
                $greedy = true;
            }

            else if ($vTPS[$i]['v'] == $dSarana[$j]['v'] * $MAX_SERVICE) {
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

//        F.S:
//        vTPS yang sudah ditangani dengan sempurna ditandai dengan true pada flagnya
//        beberapa sarana sudah memiliki tps yang ditangani, terdapat pada tps nya
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
                    $sisa = $rTPS[$last]['v'] - $MAX_SERVICE * $dSarana[$j]['v'];
                    if ($sisa > $this->EPSILON) {
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

//        F.S: cTPS berisi TPS yang dilayani oleh truk kita

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

//        F.S: degree berisi berapa kali seharusnya sebuah truk bulak balik dari TPS ke TPA supaya cukup

//        tpsDegree (idTPS, degree) => jumlah berisi informasi brp banyak kendaraan yang memiliki derajat degree pada
//        TPS dengan id idTPS
        $tpsDegree = [];
        foreach ($degree as $idSaranaa => $derajat) {
            $idx = $this->findIndex($idSaranaa, $dSarana);
            if ($derajat > 6)
                $rDerajat = 6;
            else
                $rDerajat = $derajat;
            $key = $dSarana[$idx]['tps'] * 1000 + $rDerajat;
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
                    if ($degree[$idSarana] > 6)
                        $derajat = 6;
                    else
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
        $totalRecall = $this->totalRecallSarana();
        $degree = $totalRecall['degree'];
        $dSarana = $totalRecall['dSarana'];
        $bTPS = $totalRecall['bTPS'];

        $pengangkuts = User::where('role', 'waste_pengangkut')->get();
        $idx = 0; $lPengangkuts = count($pengangkuts);
        for ($i = 0; $i < 3; $i++)
            foreach ($degree as $truckId => $numTrip) {
                if ($numTrip > 2*$i && $idx < $lPengangkuts) { // bisa dijadwalkan
                    $pengangkut = $pengangkuts[$idx];
                    $idx++;
                    $jadwal = Jadwal::create(['summary' => 'jadwal untuk petugas pengangkut sampah: '.$pengangkut->nama]);
                    $truckIdx = $this->findIndex($truckId, $dSarana);
                    $namaTPS = Tpsampah::find($dSarana[$truckIdx]['tps'])->name;

                    $mulai = $i*8;
                    $akhir = $mulai + 4;
                    $akhir0 = $akhir + 4;

                    if ($mulai < 10)
                        $smulai = '0' . $mulai . '0000';
                    else
                        $smulai = $mulai . '0000';

                    if ($akhir < 10)
                        $sakhir = '0'. $akhir . '0000';
                    else
                        $sakhir = $akhir . '0000';

                    if ($akhir0 < 10)
                        $sakhir0 = '0' . $akhir0 . '0000';
                    else
                        $sakhir0 = $akhir0 . '0000';

                    $description = 'Mengangkut sampah dari ' . $namaTPS . ' ke TPA';

                    $jadwal->details()->save(new DetailJadwal(['start_time' => $smulai, 'end_time' => $sakhir, 'description' => $description]));
                    $jadwal->details()->save(new DetailJadwal(['start_time' => $sakhir, 'end_time' => $sakhir0, 'description' => $description]));

                    UserJadwal::create(['id_user' => $pengangkut->id, 'id_jadwal' => $jadwal->id]);
                }
            }

        $penyapus = User::where('role', 'waste_penyapu')->get();
        $idx = 0; $lPenyapu = count($penyapus);
        $lTPS = count($bTPS);
        $beres = 0;
        while ($beres < $lTPS && $idx < $lPenyapu)
            for ($i = 0; $i < $lTPS; $i++) {
                $tps = $bTPS[$i];
                $namaTPS = Tpsampah::find($tps['id'])->name;

                if ($tps['v'] > $this->EPSILON && $idx < $lPenyapu) {
                    $penyapu = $penyapus[$idx];
                    $idx++;

                    $jadwal = Jadwal::create(['summary' => 'jadwal untuk petugas penyapu jalan: '.$penyapu->nama]);

                    $jadwal->details()->save(new DetailJadwal(['start_time' => '080000', 'end_time' => '160000',
                        'description' => 'menyapu di sekitar '.$namaTPS]));

                    UserJadwal::create(['id_user' => $penyapu->id, 'id_jadwal' => $jadwal->id]);

                    $bTPS[$i]['v'] -= 10;
                    if ($bTPS[$i]['v'] < $this->EPSILON)
                        $beres++;
                }
            }
    }

    public function hitungPetugas() {
//        volume sampah maksimal untuk satu penyapu dalam 1 shift kerja (8 jam)
        $MAX_PENYAPU = 10;

        $totalRecall = $this->totalRecallSarana();
        $bTPS = $totalRecall['bTPS'];
        $butuhPenyapu = 0;
        foreach ($bTPS as $vTPS) {
            $butuhPenyapu += ceil($vTPS['v']/$MAX_PENYAPU);
        }

        $degree = $totalRecall['degree'];
        $butuhSupir = 0;
        foreach ($degree as $truck_id => $num_trip) {
            if ($num_trip > 4)
                $butuhSupir += 3;
            else
                $butuhSupir += ceil($num_trip/2);
        }

        return view('jadwal.count_worker', compact('bTPS', 'butuhPenyapu', 'butuhSupir'));
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
