<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToForumCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('forum_commentaire', function(Blueprint $table)
		{
			$table->foreign('forum_id', 'forum_commentaire')->references('id')->on('forum')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('utilisateur_id', 'forum_commentaire_utilisateur')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('forum_commentaire', function(Blueprint $table)
		{
			$table->dropForeign('forum_commentaire');
			$table->dropForeign('forum_commentaire_utilisateur');
		});
	}

}
