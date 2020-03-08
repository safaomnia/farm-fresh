<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommandeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commande', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('quantite');
			$table->enum('valide', array('0','1'));
			$table->bigInteger('produit_id')->unsigned()->index('produit_id');
			$table->bigInteger('client_id')->unsigned()->index('client_id');
			$table->bigInteger('livraison_id')->unsigned()->index('livraison_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commande');
	}

}
