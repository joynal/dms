<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedualsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_scheduals', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('coffer_id', false, true);
            $table->string('day', 5);
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
		Schema::table('class_scheduals', function(Blueprint $table) {
			$table->dropForeign('class_scheduals_coffer_id_foreign');
		});
		
		Schema::drop('class_scheduals');
	}

}
