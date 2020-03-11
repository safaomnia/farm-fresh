<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMessagerieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('messagerie', function(Blueprint $table)
		{
			$table->foreign('emetteur_id', 'messagerie_emetteur')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('recepteur_id', 'messagerie_recepteur')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('messagerie', function(Blueprint $table)
		{
			$table->dropForeign('messagerie_emetteur');
			$table->dropForeign('messagerie_recepteur');
		});
	}

}
