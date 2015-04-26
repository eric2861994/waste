<?php

use Illuminate\Database\Seeder;
use App\TipeSarana;

class TipeSaranaTableSeeder extends Seeder {

    public function run()
    {
//        Tolong tambahkan daftar Tipe Sarana disini, cari minimal 5, maksimal 10.
        TipeSarana::create(['type' => 'Truk A', 'count' => 10]);
//        Yang di atas cuma contoh, diganti ya, kecuali emang itu namanya. countnya diisi random aja, asalkan masuk akal

    }

}