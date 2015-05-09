<?php

use Illuminate\Database\Seeder;
use App\Tpsampah;
use App\EntriTpsampah;

class EntriTpsampahTableSeeder extends Seeder {

    public function run()
    {
        $tpsampahs = Tpsampah::all();
        $v = 11.0;
        foreach ($tpsampahs as $tpsampah) {
            $tpsampah->entries()->save(new EntriTpsampah(['volume' => $v]));
            $v -= 1.1;
        }
    }

}

?>
