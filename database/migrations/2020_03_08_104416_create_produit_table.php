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
			$table->bigInteger('id', true)->unsigned();
			$table->string('nom', 300);
			$table->integer('prix');
			$table->integer('stock');
			$table->text('image', 65535);
			$table->longText('description');
			$table->integer('categorie_id')->unsigned()->index('categorie_id');
			$table->bigInteger('ferme_id')->unsigned()->index('ferme_id');
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
		Schema::drop('produit');
	}

}
