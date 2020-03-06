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
			$table->text('text');
			$table->dateTime('date');
			$table->bigInteger('utiisateur_id')->unsigned()->index('utiisateur_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::disableForeignKeyConstraints();
		Schema::drop('annonce');
		Schema::enableForeignKeyConstraints();
	}

}
