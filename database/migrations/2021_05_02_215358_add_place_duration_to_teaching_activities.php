<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaceDurationToTeachingActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teaching_activities', function (Blueprint $table) {
            $table->string('time_allocation_is');
            $table->string('set_time_allocation');
            $table->string('teaching_place')->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('only_online')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teaching_activities', function (Blueprint $table) {
            $table->dropColumn('time_allocation_is');
            $table->dropColumn('set_time_allocation');
            $table->dropColumn('teaching_place')->nullable();
            $table->dropColumn('meeting_link')->nullable();
            $table->dropColumn('only_online')->nullable();
        });
    }
}
