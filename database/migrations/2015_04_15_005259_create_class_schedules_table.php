<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_schedules', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('day', 5);
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
		Schema::table('class_schedules', function(Blueprint $table) {
			$table->dropForeign('class_schedules_coffer_id_foreign');
			$table->dropForeign('class_schedules_semester_id_foreign');
		});
		
		Schema::drop('class_schedules');
	}

}
