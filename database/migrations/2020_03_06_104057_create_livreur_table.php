<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLivreurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('livreur', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->index('id');
			$table->text('entreprise', 65535);
			$table->text('adresse', 65535);
			$table->string('telephone', 15);
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
		Schema::drop('livreur');
		Schema::enableForeignKeyConstraints();
	}

}
