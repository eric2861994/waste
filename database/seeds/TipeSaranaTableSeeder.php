<?php

use Illuminate\Database\Seeder;
use App\TipeSarana;

class TipeSaranaTableSeeder extends Seeder {

    public function run()
    {
        TipeSarana::create(['type' => 'Truk Compactor Besar', 'volume' => 5,'count' => 4]);
        TipeSarana::create(['type' => 'Truk Compactor Kecil', 'volume' => 3, 'count' => 2]);
        TipeSarana::create(['type' => 'Dump Truck Besar', 'volume' => 6, 'count' => 2]);
        TipeSarana::create(['type' => 'Dump Truck Kecil','volume' => 4, 'count' => 4]);
        TipeSarana::create(['type' => 'Arm Roll Besar', 'volume' => 5.5, 'count' => 4]);
        TipeSarana::create(['type' => 'Arm Roll Kecil', 'volume' => 3.5, 'count' => 4]);
        TipeSarana::create(['type' => 'Mobil Kecil', 'volume' => 1, 'count' => 11]);
    }

}
?>
