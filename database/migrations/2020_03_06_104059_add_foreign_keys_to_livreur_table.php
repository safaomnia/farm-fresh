<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLivreurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('livreur', function(Blueprint $table)
		{
			$table->foreign('id', 'livreur_ibfk_1')->references('id')->on('utilisateur')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('livreur', function(Blueprint $table)
		{
			$table->dropForeign('livreur_ibfk_1');
		});
	}

}
