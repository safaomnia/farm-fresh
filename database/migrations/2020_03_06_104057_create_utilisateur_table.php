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
			$table->simple_array('sexe');
			$table->string('telephone', 15);
			$table->string('email', 30);
			$table->string('adresse', 50);
			$table->string('password', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::disableForeignKeyConstraints();
		Schema::drop('utilisateur');
		Schema::enableForeignKeyConstraints();
	}

}
