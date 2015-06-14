<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('semester_results', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 10);
            $table->float('sgpa');
            $table->integer('student_id', false, true);
            $table->integer('semester_id', false, true);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('semester_id')->references('id')->on('semesters');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('semester_results', function(Blueprint $table) {
			$table->dropForeign('semester_results_student_id_foreign');
			$table->dropForeign('semester_results_semester_id_foreign');
		});
		Schema::drop('semester_results');
	}

}
