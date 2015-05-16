<?php

use Illuminate\Database\Seeder;
use App\TipeSarana;
use App\Sarana;

class SaranaTableSeeder extends Seeder {

    public function run()
    {
        $tipesarana = TipeSarana::where('type', 'Mobil Kecil')->first();
        for ($i = 0; $i < 10; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 100'.$i.' KCH']));
        for ($i = 10; $i < 12; $i++)
            $tipesarana->saranas()->save(new Sarana(['plate_number' => 'D 10'.$i.' KCH']));

        $tipesarana = TipeSarana::where('type', 'Truk Compactor Kecil')->first();
        for ($i = 0; $i < 2; $i++)
            $tipesarana->saranas()->save(new Sarana['plate_number' => 'D 200'.$i.' KCH']);

        
    }

}