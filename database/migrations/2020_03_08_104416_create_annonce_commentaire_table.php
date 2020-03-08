<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnonceCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annonce_commentaire', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
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
		Schema::drop('annonce_commentaire');
	}

}
