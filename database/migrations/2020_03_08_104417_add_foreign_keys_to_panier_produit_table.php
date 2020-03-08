<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPanierProduitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('panier_produit', function(Blueprint $table)
		{
			$table->foreign('panier_id', 'panier_produit_ibfk_1')->references('id')->on('panier')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('produit_id', 'panier_produit_ibfk_2')->references('id')->on('produit')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('panier_produit', function(Blueprint $table)
		{
			$table->dropForeign('panier_produit_ibfk_1');
			$table->dropForeign('panier_produit_ibfk_2');
		});
	}

}
