<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToForumCommentaireRepondreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('forum_commentaire_repondre', function(Blueprint $table)
		{
			$table->foreign('forum_commentarie_id', 'forum_commentaire_id')->references('id')->on('forum_commentaire')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('utilisateur_id', 'repondre_commentaire_utilisateur_id')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('forum_commentaire_repondre', function(Blueprint $table)
		{
			$table->dropForeign('forum_commentaire_id');
			$table->dropForeign('repondre_commentaire_utilisateur_id');
		});
	}

}
