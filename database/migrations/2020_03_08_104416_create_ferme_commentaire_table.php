<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFermeCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ferme_commentaire', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('commentaire', 65535);
			$table->bigInteger('utilisateur_id')->unsigned()->index('utilisateur_id');
			$table->bigInteger('ferme_id')->unsigned()->index('ferme_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ferme_commentaire');
	}

}
