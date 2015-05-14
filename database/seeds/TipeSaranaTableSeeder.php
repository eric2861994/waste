<?php

use Illuminate\Database\Seeder;
use App\TipeSarana;

class TipeSaranaTableSeeder extends Seeder {

    public function run()
    {
//        TipeSarana::create(['type' => 'Truk Compactor Besar', 'count' => 5]);
//        TipeSarana::create(['type' => 'Truk Compactor Kecil', 'count' => 7]);
//        TipeSarana::create(['type' => 'Dump Truck Besar', 'count' => 17]);
//        TipeSarana::create(['type' => 'Dump Truck Kecil', 'count' => 12]);
//        TipeSarana::create(['type' => 'Arm Roll Besar', 'count' => 52]);
//        TipeSarana::create(['type' => 'Arm Roll Kecil', 'count' => 11]);
//        TipeSarana::create(['type' => 'Mobil Kecil', 'count' => 4]);

        $sarana = array(
          ['type' => 'Truk Compactor Besar', 'volume' => 3, 'count' => 5],
          ['type' => 'Truk Compactor Kecil', 'volume' => 2, 'count' => 7],
          ['type' => 'Dump Truck Besar', 'volume' => 5, 'count' => 17],
          ['type' => 'Dump Truck Kecil', 'volume' => 4, 'count' => 12],
          ['type' => 'Arm Roll Besar', 'volume' => 7, 'count' => 52],
          ['type' => 'Arm Roll Kecil', 'volume' => 6, 'count' => 11],
          ['type' => 'Mobil Kecil', 'volume' => 1, 'count' => 4]
        );

        DB::table('ppl_waste_tipe_saranas') -> insert($sarana);
    }

}
?>
