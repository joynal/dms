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
            $table->integer('coffer_id', false, true);
            $table->string('name', 5);
            $table->dateTime('from');
            $table->datetime('to');
            $table->string('campus', 25);
            $table->timestamps();

            $table->foreign('coffer_id')->references('id')->on('coffers')
				->onDelete('restrict');
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
		});

		Schema::drop('exam_schedules');
	}

}
