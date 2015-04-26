<?php

use Illuminate\Database\Seeder;
use App\Tpakhir;

class TpakhirTableSeeder extends Seeder {

    public function run()
    {
//        Tolong tambahkan daftar TPA disini, cari minimal 5, maksimal 10.
        Tpakhir::create(['name' => 'TPA Bandung', 'location' => 'Bandung']);
//        Yang TPA Bandung itu cuma contoh, diganti ya, kecuali emang itu namanya.

    }

}