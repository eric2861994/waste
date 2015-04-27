<?php

use Illuminate\Database\Seeder;
use App\TipeSarana;

class TipeSaranaTableSeeder extends Seeder {

    public function run()
    {
<<<<<<< HEAD
      /*  TipeSarana::create(['type' => 'Truk Compactor Besar', 'count' => 5]);
        TipeSarana::create(['type' => 'Truk Compactor Kecil', 'count' => 7]);
        TipeSarana::create(['type' => 'Dump Truck Besar', 'count' => 17]);
        TipeSarana::create(['type' => 'Dump Truck Kecil', 'count' => 12]);
        TipeSarana::create(['type' => 'Arm Roll Besar', 'count' => 52]);
        TipeSarana::create(['type' => 'Arm Roll Kecil', 'count' => 11]);
        TipeSarana::create(['type' => 'Mobil Kecil', 'count' => 4]); */
=======
//        Tolong tambahkan daftar Tipe Sarana disini, cari minimal 5, maksimal 10.
        TipeSarana::create(['type' => 'Truk A']);
//        Yang di atas cuma contoh, diganti ya, kecuali emang itu namanya. countnya diisi random aja, asalkan masuk akal
>>>>>>> ca256a19b1dd2ff325e6068699d0992675e96194

        $sarana = array(
          ['type' => 'Truk Compactor Besar', 'count' => 5],
          ['type' => 'Truk Compactor Kecil', 'count' => 7],
          ['type' => 'Dump Truck Besar', 'count' => 17],
          ['type' => 'Dump Truck Kecil', 'count' => 12],
          ['type' => 'Arm Roll Besar', 'count' => 52],
          ['type' => 'Arm Roll Kecil', 'count' => 11],
          ['type' => 'Mobil Kecil', 'count' => 4]
        );

        DB::table('tipe_saranas') -> insert($sarana);
    }

}
?>
