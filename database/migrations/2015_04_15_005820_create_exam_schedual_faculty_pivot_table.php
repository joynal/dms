<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamSchedualFacultyPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_schedual_faculty', function(Blueprint $table)
		{
			$table->integer('exam_schedual_id')->unsigned()->index();
			$table->foreign('exam_schedual_id')->references('id')->on('exam_scheduals')->onDelete('cascade');
			$table->integer('faculty_id')->unsigned()->index();
			$table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
			$table->string('status', 5);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_schedual_faculty');
	}

}
