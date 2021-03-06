<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamScheduleLevelPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_schedule_level', function(Blueprint $table)
		{
			$table->integer('exam_schedule_id')->unsigned()->index();
			$table->foreign('exam_schedule_id')->references('id')->on('exam_schedules')->onDelete('cascade');
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
		Schema::drop('exam_schedule_level');
	}

}
