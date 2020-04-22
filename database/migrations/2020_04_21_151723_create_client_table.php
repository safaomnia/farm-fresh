<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('nom', 65535);
			$table->text('prenom', 65535);
			$table->date('datenai');
			$table->enum('sexe', array('Femme','Homme'));
			$table->string('telephone', 15);
			$table->string('email', 100);
			$table->string('adresse', 50);
			$table->string('password', 100);
			$table->text('photo', 65535);
			$table->enum('type', array('livreur','agriculteur','client'))->default('client');
			$table->dateTime('email_verified_at');
			$table->timestamps();
			$table->string('remember_token', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client');
	}

}