<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentaireAnnonceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentaire_annonce', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->text('commentaire', 65535);
			$table->bigInteger('annonce_id')->unsigned()->index('annonce_id');
			$table->bigInteger('utilisateur_id')->unsigned()->index('utilisateur_id');
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
		Schema::drop('commentaire_annonce');
	}

}
