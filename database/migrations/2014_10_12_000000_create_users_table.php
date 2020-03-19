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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default(encode('Aa@123456'));
            $table->string('status')->default('Not Actived');
            $table->string('role')->default('Student');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('avatar')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('code');
            $table->boolean('gender');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
