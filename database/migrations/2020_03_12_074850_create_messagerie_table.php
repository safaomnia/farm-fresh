<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagerieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messagerie', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('message', 65535)->nullable();
			$table->text('fichier', 65535)->nullable();
			$table->bigInteger('recepteur_id')->unsigned()->index('recepteur_id');
			$table->bigInteger('emetteur_id')->unsigned()->index('emetteur_id');
			$table->timestamps();
			$table->dateTime('seen_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messagerie');
	}

}
