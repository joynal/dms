<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->tinyInteger('batch', false, true)->length(3);
            $table->string('section', 1);
            $table->string('program', 10);
            $table->string('reg_id', 12);
            $table->date('birth_date');
            $table->date('admission_date');
            $table->integer('level_id', false, true);
            $table->integer('user_id', false, true);
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table)
        {
            $table->dropForeign('students_level_id_foreign');
        });
        Schema::drop('students');
    }

}
