<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCofferStudentPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffer_student', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->integer('coffer_id')->unsigned()->index();
			$table->foreign('coffer_id')->references('id')->on('coffers')->onDelete('cascade');
			$table->integer('student_id')->unsigned()->index();
			$table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
			$table->string('status', 10);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coffer_student');
	}

}
