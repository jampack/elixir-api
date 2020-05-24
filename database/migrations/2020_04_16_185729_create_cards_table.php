<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('board_column_id');
            $table->unsignedInteger('task_type_id');
            $table->string('title', 150);
            $table->string('description', 10000)->nullable();
            $table->unsignedInteger('type'); // 1: task, 2: epic, 3: story
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('board_column_id')->references('id')->on('board_columns');
            $table->foreign('task_type_id')->references('id')->on('card_task_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
