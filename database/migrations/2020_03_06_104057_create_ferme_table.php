<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFermeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ferme', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->text('nom', 65535);
			$table->string('adresse', 50);
			$table->string('contact', 50);
			$table->bigInteger('agriculteur_id')->unsigned()->index('agriculteur_id');
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
	  Schema::drop('ferme');
	  Schema::enableForeignKeyConstraints();
	}

}
