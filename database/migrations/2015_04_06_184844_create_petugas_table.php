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
		Schema::create('petugas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nip')->unique();
//            nik berasal dari ducapil
            $table->integer('user_id')->unsigned();
            $table->integer('jadwal_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('petugas');
	}

}
