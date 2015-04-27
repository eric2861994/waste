<?php

use Illuminate\Database\Seeder;
use App\Tpsampah;

class TpsampahTableSeeder extends Seeder {

    public function run()
    {

        Tpsampah::create(['name' => 'TPS Coblong', 'location' => 'Kecamatan Coblong']);
        Tpsampah::create(['name' => 'TPS Bandung Wetan', 'location' => 'Kecamatan Bandung Wetan']);
        Tpsampah::create(['name' => 'TPS Cicadap', 'location' => 'Kecamatan Cicadap']);
        Tpsampah::create(['name' => 'TPS Cibeunying Kaler', 'location' => 'Kecamatan Cibeunying Kaler']);
        Tpsampah::create(['name' => 'TPS Cibeunying Kidul', 'location' => 'Kecamatan Cibeunying Kidul']);
        Tpsampah::create(['name' => 'TPS Sumur Bandung', 'location' => 'Kecamatan Sumur Bandung']);
        Tpsampah::create(['name' => 'TPS Tegallega', 'location' => 'Tegallega']);
        Tpsampah::create(['name' => 'TPS Mekar Wangi', 'location' => 'Mekar Wangi']);
        Tpsampah::create(['name' => 'TPS Cirateun', 'location' => 'Cirateun']);
        Tpsampah::create(['name' => 'TPS Holis', 'location' => 'Holis']);

  }

}

?>
