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
			$table->foreign('annonce_id', 'annonce_commentaire_ibfk_1')->references('id')->on('annonce')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('utilisateur_id', 'annonce_commentaire_ibfk_2')->references('id')->on('utilisateur')->onUpdate('CASCADE')->onDelete('CASCADE');
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
			$table->dropForeign('annonce_commentaire_ibfk_1');
			$table->dropForeign('annonce_commentaire_ibfk_2');
		});
	}

}
