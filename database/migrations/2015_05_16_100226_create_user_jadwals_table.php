<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserJadwalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_waste_user_jadwals', function(Blueprint $table)
		{
			$table->integer('id_user')->unsigned();
            $table->integer('id_jadwal')->unsigned();

            $table->primary(['id_user', 'id_jadwal']);
            $table->foreign('id_user')->references('id')->on('ppl_dukcapil_ktp')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id')->on('ppl_waste_jadwals')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_waste_user_jadwals');
	}

}
