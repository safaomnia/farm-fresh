<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommandeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commande', function(Blueprint $table)
		{
			$table->foreign('client_id', 'commande_ibfk_1')->references('id')->on('client')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('livraison_id', 'commande_ibfk_2')->references('id')->on('livraison')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('produit_id', 'commande_ibfk_3')->references('id')->on('produit')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commande', function(Blueprint $table)
		{
			$table->dropForeign('commande_ibfk_1');
			$table->dropForeign('commande_ibfk_2');
			$table->dropForeign('commande_ibfk_3');
		});
	}

}
