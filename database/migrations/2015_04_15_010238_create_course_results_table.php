<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_results', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('coffer_id', false, true);
            $table->integer('student_id', false, true);
            $table->float('mid');
            $table->float('final');
            $table->float('class_test');
            $table->float('other');
            $table->timestamps();

            $table->foreign('coffer_id')->references('id')->on('coffers')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('coffers');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_results', function(Blueprint $table) {
			$table->dropForeign('course_results_coffer_id_foreign');
			$table->dropForeign('course_results_student_id_foreign');
		});

		Schema::drop('course_results');
	}

}
