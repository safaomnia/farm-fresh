<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProduitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('produit', function(Blueprint $table)
		{
			$table->foreign('ferme_id', 'produit_ferme')->references('id')->on('ferme')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('produit', function(Blueprint $table)
		{
			$table->dropForeign('produit_ferme');
		});
	}

}
