<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepondeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reponde', function(Blueprint $table)
		{
			$table->foreign('commentaire_id', 'forum_commentaire_id')->references('id')->on('commentaire')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('client_id', 'repondre_commentaire_utilisateur_id')->references('id')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reponde', function(Blueprint $table)
		{
			$table->dropForeign('forum_commentaire_id');
			$table->dropForeign('repondre_commentaire_utilisateur_id');
		});
	}

}
