<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachingActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching_activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('course_id');
            $table->string('activity_type');
            $table->string('day');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('students_group_id')->nullable();
            $table->string('teacher')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teaching_activities');
    }
}
