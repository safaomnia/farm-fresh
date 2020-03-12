<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnonceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annonce', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('text', 65535);
			$table->bigInteger('utilisateur_id')->unsigned()->index('utilisateur_id');
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
		Schema::drop('annonce');
	}

}
