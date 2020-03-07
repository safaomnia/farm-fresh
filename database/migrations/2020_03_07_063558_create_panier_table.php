<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePanierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('panier', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('ipv4', 11);
			$table->bigInteger('utilisateur_id')->unsigned()->index('utilisateur_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('panier');
	}

}
