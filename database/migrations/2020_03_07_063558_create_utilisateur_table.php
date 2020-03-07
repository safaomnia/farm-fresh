<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUtilisateurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilisateur', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->text('nom', 65535);
			$table->text('prenom', 65535);
			$table->date('datenai');
			$table->string('sexe');
			$table->string('telephone', 15);
			$table->string('email', 30);
			$table->string('adresse', 50);
			$table->string('password', 100);
			$table->text('photo', 65535);
			$table->dateTime('email_verified_at');
			$table->string('remember_token', 50);
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
		Schema::drop('utilisateur');
	}

}
