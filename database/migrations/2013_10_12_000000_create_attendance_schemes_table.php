<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('casual_leaves')->nullable();
            $table->integer('sick_leaves')->nullable();
            $table->integer('planned_leaves')->nullable();
            $table->integer('work_from_home')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_schemes');
    }
}
