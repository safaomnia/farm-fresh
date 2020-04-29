<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduitNoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produit_note', function(Blueprint $table)
		{
			$table->float('etoiles')->default(0);
			$table->bigInteger('client_id')->unsigned()->index('utilisateur_id');
			$table->bigInteger('produit_id')->unsigned()->index('ferme_id');
			$table->timestamps();
			$table->primary(['client_id','produit_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('produit_note');
	}

}
