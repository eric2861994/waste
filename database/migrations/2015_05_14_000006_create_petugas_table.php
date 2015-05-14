<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_waste_petugas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nip')->unique();
//            nik berasal dari ducapil
            $table->integer('user_id')->unsigned();
            $table->integer('jadwal_id')->unsigned()->nullable();

            $table->foreign('jadwal_id')->references('id')->on('ppl_waste_jadwals');
            $table->foreign('user_id')->references('id')->on('ppl_waste_users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_waste_petugas');
	}

}
