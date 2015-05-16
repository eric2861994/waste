<?php

use Illuminate\Database\Seeder;
use App\TipeSarana;
use App\Sarana;

class SaranaTableSeeder extends Seeder {

    public function run()
    {
//        seed mobil kecil
        $tipesarana = TipeSarana::where('type', 'Mobil Kecil')->first();
        for ($i = 0; $i < 10; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 100'.$i.' KCH']));

//        seed truk compactor kecil
        $tipesarana = TipeSarana::where('type', 'Truk Compactor Kecil')->first();
        for ($i = 0; $i < 1; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 200'.$i.' KCH']));

//        seed arm roll kecil
        $tipesarana = TipeSarana::where('type', 'Arm Roll Kecil')->first();
        for ($i = 0; $i < 1; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 300'.$i.' KCH']));

//        seed Dump Truck Kecil
        $tipesarana = TipeSarana::where('type', 'Dump Truck Kecil')->first();
        for ($i = 0; $i < 3; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 400'.$i.' KCH']));

//        seed Truk Compactor Besar
        $tipesarana = TipeSarana::where('type', 'Truk Compactor Besar')->first();
        for ($i = 0; $i < 2; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 500'.$i.' KCH']));

//        seed Arm Roll Besar
        $tipesarana = TipeSarana::where('type', 'Arm Roll Besar')->first();
        for ($i = 0; $i < 3; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 600'.$i.' KCH']));

//        seed Dump Truck Besar
        $tipesarana = TipeSarana::where('type', 'Dump Truck Besar')->first();
        for ($i = 0; $i < 3; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 700'.$i.' KCH']));
    }
}