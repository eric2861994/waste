<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipeSaranasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_waste_tipe_saranas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('type')->unique();
            $table->double('volume', 15, 8);
            $table->integer('count')->unsigned()->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_waste_tipe_saranas');
	}

}
