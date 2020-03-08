<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFermeNoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ferme_note', function(Blueprint $table)
		{
			$table->foreign('ferme_id', 'ferme_note_ibfk_1')->references('id')->on('ferme')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('utilisateur_id', 'ferme_note_ibfk_2')->references('id')->on('utilisateur')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ferme_note', function(Blueprint $table)
		{
			$table->dropForeign('ferme_note_ibfk_1');
			$table->dropForeign('ferme_note_ibfk_2');
		});
	}

}
