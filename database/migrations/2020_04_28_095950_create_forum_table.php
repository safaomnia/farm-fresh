<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('theme', 65535)->nullable();
			$table->text('description', 65535);
			$table->text('fichier', 65535)->nullable();
			$table->bigInteger('client_id')->unsigned()->index('utilisateur_id');
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
		Schema::drop('forum');
	}

}
