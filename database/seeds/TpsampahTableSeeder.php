<?php

use Illuminate\Database\Seeder;
use App\Tpsampah;

class TpsampahTableSeeder extends Seeder {

    public function run()
    {
//        Tolong tambahkan daftar TPS disini, cari minimal 10, maksimal 25.
        Tpsampah::create(['name' => 'TPS Ciumbuleuit', 'location' => 'Ciumbeluit']);
//        Yang di atas cuma contoh, diganti ya, kecuali emang itu namanya.
    }

}