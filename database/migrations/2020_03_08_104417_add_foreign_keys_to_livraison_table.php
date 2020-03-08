<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLivraisonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('livraison', function(Blueprint $table)
		{
			$table->foreign('livreur_id', 'livraison_ibfk_1')->references('id')->on('livreur')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('livraison', function(Blueprint $table)
		{
			$table->dropForeign('livraison_ibfk_1');
		});
	}

}
