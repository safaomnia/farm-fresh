<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentaireAnnonceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commentaire_annonce', function(Blueprint $table)
		{
			$table->foreign('annonce_id', 'commentaire_annonce_ibfk_1')->references('id')->on('annonce')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('utilisateur_id', 'commentaire_annonce_ibfk_2')->references('id')->on('utilisateur')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commentaire_annonce', function(Blueprint $table)
		{
			$table->dropForeign('commentaire_annonce_ibfk_1');
			$table->dropForeign('commentaire_annonce_ibfk_2');
		});
	}

}
