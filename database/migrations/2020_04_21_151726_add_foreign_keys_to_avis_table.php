<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAvisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('avis', function(Blueprint $table)
		{
			$table->foreign('ferme_id', 'ferme_avis')->references('id')->on('ferme')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('client_id', 'ferme_avis_utilisateur')->references('id')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('avis', function(Blueprint $table)
		{
			$table->dropForeign('ferme_avis');
			$table->dropForeign('ferme_avis_utilisateur');
		});
	}

}
