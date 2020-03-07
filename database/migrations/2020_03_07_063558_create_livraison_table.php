<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLivraisonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('livraison', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->string('trajectoire', 50);
			$table->bigInteger('livreur_id')->unsigned()->index('livreur_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('livraison');
	}

}
