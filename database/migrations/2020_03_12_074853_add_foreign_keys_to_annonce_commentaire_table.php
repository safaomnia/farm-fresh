<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnnonceCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('annonce_commentaire', function(Blueprint $table)
		{
			$table->foreign('annonce_id', 'annonce_commentaire')->references('id')->on('annonce')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('utilisateur_id', 'annonce_commentaire_utilisateur')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('annonce_commentaire', function(Blueprint $table)
		{
			$table->dropForeign('annonce_commentaire');
			$table->dropForeign('annonce_commentaire_utilisateur');
		});
	}

}
