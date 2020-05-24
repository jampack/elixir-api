<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('status_id');
            $table->string('name', 50);
            $table->string('description', 500)->nullable();
            $table->string('slug')->unique('projects_slug_index');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('project_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
