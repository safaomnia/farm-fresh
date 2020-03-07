<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnonceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annonce', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->text('text', 65535);
			$table->dateTime('date');
			$table->bigInteger('utilisateur_id')->unsigned()->index('utitisateur_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('annonce');
	}

}
