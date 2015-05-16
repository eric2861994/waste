<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriTpakhirsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_waste_entri_tpakhirs', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('tps_id')->unsigned();
            $table->integer('tpa_id')->unsigned();
            $table->double('volume', 15, 8);
            $table->timestamps();

            $table->foreign('tps_id')->references('id')->on('ppl_waste_tpsampahs')->onDelete('cascade');
            $table->foreign('tpa_id')->references('id')->on('ppl_waste_tpakhirs')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_waste_entri_tpakhirs');
	}

}
