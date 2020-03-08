<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFermeNoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ferme_note', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('nb_etoile');
			$table->bigInteger('utilisateur_id')->unsigned()->index('utilisateur_id');
			$table->bigInteger('ferme_id')->unsigned()->index('ferme_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ferme_note');
	}

}
