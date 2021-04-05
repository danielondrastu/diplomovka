<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_courses', function (Blueprint $table) {
            $table->string('guaranting_department')->nullable();
            $table->integer('time_allocation')->nullable();
            $table->integer('requested_time_allocation')->nullable();
            $table->integer('max_stud')->nullable();
            $table->string('not_parallel')->nullable();
            $table->string('day')->nullable();
            $table->string('time_from')->nullable();
            $table->string('time_to')->nullable();
            $table->string('special_requirements')->nullable();
            $table->string('message_for_students')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_courses', function (Blueprint $table) {
            //
        });
    }
}
