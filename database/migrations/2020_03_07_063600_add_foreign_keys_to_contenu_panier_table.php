<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContenuPanierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contenu_panier', function(Blueprint $table)
		{
			$table->foreign('panier_id', 'contenu_panier_ibfk_1')->references('id')->on('panier')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('produit_id', 'contenu_panier_ibfk_2')->references('id')->on('produit')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contenu_panier', function(Blueprint $table)
		{
			$table->dropForeign('contenu_panier_ibfk_1');
			$table->dropForeign('contenu_panier_ibfk_2');
		});
	}

}
