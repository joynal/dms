<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCofferLevelPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffer_level', function(Blueprint $table)
		{
			$table->integer('coffer_id')->unsigned()->index();
			$table->foreign('coffer_id')->references('id')->on('coffers')->onDelete('cascade');
			$table->integer('level_id')->unsigned()->index();
			$table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coffer_level');
	}

}
