<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_schedules', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 5);
            $table->date('date');
            $table->time('from');
            $table->time('to');
            $table->string('campus', 25);
            $table->integer('coffer_id', false, true);
            $table->integer('semester_id', false, true);
            $table->timestamps();

            $table->foreign('coffer_id')->references('id')->on('coffers')
				->onDelete('restrict');

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

		Schema::table('exam_schedules', function(Blueprint $table) {
			$table->dropForeign('exam_schedules_coffer_id_foreign');
			$table->dropForeign('exam_schedules_semester_id_foreign');
		});

		Schema::drop('exam_schedules');
	}

}
