<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePanierProduitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('panier_produit', function(Blueprint $table)
		{
			$table->bigInteger('panier_id')->unsigned();
			$table->bigInteger('produit_id')->unsigned()->index('produit_id');
			$table->unique(['panier_id','produit_id'], 'panier_id_2');
			$table->index(['panier_id','produit_id'], 'panier_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('panier_produit');
	}

}
