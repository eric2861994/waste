<?php

use Illuminate\Database\Seeder;
use App\Tpsampah;
use App\EntriTpsampah;

class EntriTpsampahTableSeeder extends Seeder {

    public function run()
    {
        $vs = [42.27928401032014, 43.98377048721817, 48.77957231379498, 49.00027704712896, 49.885399457237824,
            51.554006934951275, 51.60335734581891, 54.65934172033795, 55.41317530402069, 56.51028388243355];

        $tpsampahs = Tpsampah::all();
        $numTPS = count($tpsampahs);
        foreach ($tpsampahs as $idx => $tpsampah) {
            $tpsampah->entries()->save(new EntriTpsampah(['volume' => $vs[$numTPS-$idx-1]]));
        }
    }
}

?>
