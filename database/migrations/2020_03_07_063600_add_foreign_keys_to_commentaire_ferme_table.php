<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentaireFermeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commentaire_ferme', function(Blueprint $table)
		{
			$table->foreign('ferme_id', 'commentaire_ferme_ibfk_1')->references('id')->on('ferme')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('utilisateur_id', 'commentaire_ferme_ibfk_2')->references('id')->on('utilisateur')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commentaire_ferme', function(Blueprint $table)
		{
			$table->dropForeign('commentaire_ferme_ibfk_1');
			$table->dropForeign('commentaire_ferme_ibfk_2');
		});
	}

}
