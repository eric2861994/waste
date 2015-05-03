<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailJadwalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_jadwals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('jadwal_id')->unsigned();
			$table->foreign('jadwal_id')->references('id')->on('jadwals')->onDelete('cascade');
			$table->string('start_time', 6);
			$table->string('end_time', 6);
			$table->string('description', 255);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detail_jadwals');
	}

}
