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
		Schema::create('saranas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('type_id')->unsigned();
            $table->integer('schedule_id')->unsigned()->nullable();
            $table->string('plate_number', 16);
            $table->foreign('type_id')->references('id')->on('tipe_saranas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('saranas');
	}

}
