<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffers', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('program', 10);
            $table->integer('year', false, true)->length(4);
            $table->string('course_id');
            $table->integer('faculty_id', false, true);
            $table->integer('semester_id', false, true);
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')
				->onDelete('cascade');

			$table->foreign('faculty_id')->references('id')->on('faculties');

            $table->foreign('semester_id')->references('id')->on('semesters')
                ->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('coffers', function(Blueprint $table) {
			$table->dropForeign('coffers_course_id_foreign');
			$table->dropForeign('coffers_faculty_id_foreign');
			$table->dropForeign('coffers_semester_id_foreign');
		});
		Schema::drop('coffers');
	}

}
