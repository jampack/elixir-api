<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->integer('role')->default(3); // 1: admin, 2: manager, 3: developer
            $table->string('password');
            $table->unsignedBigInteger('attendance_scheme_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('plain_password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->foreign('attendance_scheme_id')->references('id')->on('attendance_schemes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
