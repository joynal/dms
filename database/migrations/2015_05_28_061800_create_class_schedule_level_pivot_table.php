<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClass_scheduleLevelPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_schedule_level', function(Blueprint $table)
		{
			$table->integer('class_schedule_id')->unsigned()->index();
			$table->foreign('class_schedule_id')->references('id')->on('class_schedules')->onDelete('cascade');
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
		Schema::drop('class_schedule_level');
	}

}
