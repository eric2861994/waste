<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriTpsampahsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entri_tpsampahs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tps_id')->unsigned();
			$table->double('volume', 15, 8);
			$table->timestamps();
			
			$table->foreign('tps_id')->references('id')->on('tpsampahs');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entri_tpsampahs');
	}

}
