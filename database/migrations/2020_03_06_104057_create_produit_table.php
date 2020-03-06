<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produit', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->string('nom', 3);
			$table->integer('prix');
			$table->integer('stock');
			$table->text('image', 65535);
			$table->integer('categorie_id')->unsigned()->index('categorie_id');
			$table->bigInteger('ferme_id')->unsigned()->index('ferme_id');
			$table->bigInteger('agriculteur_id')->unsigned()->index('agriculteur_id');
			$table->bigInteger('panier_id')->unsigned()->index('panier_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::disableForeignKeyConstraints();
		Schema::drop('produit');
		Schema::enableForeignKeyConstraints();
	}

}
