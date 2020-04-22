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
			$table->foreign('panier_id', 'panier_produit')->references('id')->on('panier')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('produit_id', 'produit_panier')->references('id')->on('produit')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('panier_produit');
			$table->dropForeign('produit_panier');
		});
	}

}