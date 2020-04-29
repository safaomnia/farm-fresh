<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProduitCategorieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('produit_categorie', function(Blueprint $table)
		{
			$table->foreign('categorie_id', 'categorie_id')->references('id')->on('categorie')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('produit_id', 'produit_id')->references('id')->on('produit')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('produit_categorie', function(Blueprint $table)
		{
			$table->dropForeign('categorie_id');
			$table->dropForeign('produit_id');
		});
	}

}
