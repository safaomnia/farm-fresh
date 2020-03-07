<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentaireFermeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentaire_ferme', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->text('commentaire', 65535);
			$table->dateTime('date');
			$table->bigInteger('utilisateur_id')->unsigned()->index('utiisateur_id');
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
		Schema::drop('commentaire_ferme');
	}

}
