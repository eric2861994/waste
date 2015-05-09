<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('KtpTableSeeder');
        $this->call('UserTableSeeder');
//        $this->call('PetugasTableSeeder');
        $this->call('TipeSaranaTableSeeder');
        $this->call('SaranaTableSeeder');
        $this->call('TpakhirTableSeeder');
        $this->call('TpsampahTableSeeder');
        $this->call('EntriTpsampahTableSeeder');
	}

}
