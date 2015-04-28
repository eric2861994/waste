<?php

use Illuminate\Database\Seeder;
use App\TipeSarana;
use App\Sarana;

class SaranaTableSeeder extends Seeder {

    public function run()
    {
//        Tolong tambahkan daftar Sarana disini, minimal 1 untuk setiap tipe, maksimal 5 untuk setiap tipe.
//        Ambil tipe sarana yang bernilai Truk A
        $tipesarana = TipeSarana::where('type', '=', 'Mobil Kecil')->first();
//        Bikin 2 sarana untuk tipe Truk A
        for ($i = 0; $i < 2; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 100'.$i.' KCH']));
//        Yang di atas cuma contoh, diganti ya, kecuali emang itu namanya. countnya diisi random aja, asalkan masuk akal

    }

}