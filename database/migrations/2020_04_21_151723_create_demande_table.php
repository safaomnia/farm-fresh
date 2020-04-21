<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemandeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('demande', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->enum('type', array('agriculteur','livreur'))->nullable();
			$table->text('certificate', 65535)->nullable();
			$table->bigInteger('client_id')->unsigned()->nullable()->index('demande_client_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('demande');
	}

}
