<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAgriculteurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agriculteur', function(Blueprint $table)
		{
			$table->foreign('id', 'utilisateur_agriculteur')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agriculteur', function(Blueprint $table)
		{
			$table->dropForeign('utilisateur_agriculteur');
		});
	}

}
