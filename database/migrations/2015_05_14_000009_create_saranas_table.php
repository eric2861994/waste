<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaranasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_waste_saranas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('type_id')->unsigned();
            $table->integer('schedule_id')->unsigned()->nullable();
            $table->string('plate_number', 16);

            $table->foreign('type_id')->references('id')->on('ppl_waste_tipe_saranas')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('ppl_waste_jadwals')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_waste_saranas');
	}

}
