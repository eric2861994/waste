<?php

use Illuminate\Database\Seeder;
use App\Petugas;

class PetugasTableSeeder extends Seeder {

    public function run()
    {
//        Tolong tambahkan daftar petugas disini, minimal 1 untuk setiap peran, maksimal 3 untuk setiap peran.
        Petugas::create(['nip' => '13599001', 'name' => 'First Worker', 'role' => 'Pengemudi truk']);
//        Yang di atas cuma contoh, diganti ya, kecuali emang itu namanya. countnya diisi random aja, asalkan masuk akal

    }

}