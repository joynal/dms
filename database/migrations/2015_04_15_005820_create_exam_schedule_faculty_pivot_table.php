<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamScheduleFacultyPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_schedule_faculty', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->integer('exam_schedule_id')->unsigned()->index();
			$table->foreign('exam_schedule_id')->references('id')->on('exam_schedules')->onDelete('cascade');
			$table->integer('faculty_id')->unsigned()->index();
			$table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_schedule_faculty');
	}

}
