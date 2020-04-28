<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_columns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('board_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('board_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_columns');
    }
}
