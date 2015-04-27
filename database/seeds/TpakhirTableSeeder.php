<?php

use Illuminate\Database\Seeder;
use App\Tpakhir;

class TpakhirTableSeeder extends Seeder {

    public function run()
    {
        Tpakhir::create(['name' => 'TPA Bantar Gebang', 'location' => 'Bandung']);
        Tpakhir::create(['name' => 'TPA Leuwi Gajah', 'location' => 'Cimahi']);
        Tpakhir::create(['name' => 'TPA Sarimukti', 'location' => 'Kab. Bandung Barat, Kec. Cipatat']);
        Tpakhir::create(['name' => 'TPA Nambo', 'location' => 'Nambo']);
        Tpakhir::create(['name' => 'TPA Legok Nangka', 'location' => 'Legok Nangka']);
        Tpakhir::create(['name' => 'TPA Babakan Jelekong', 'location' => 'Ciparay']);

    }

}

?>
