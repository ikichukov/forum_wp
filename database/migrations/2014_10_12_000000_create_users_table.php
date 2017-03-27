<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->date('dob');
            $table->string('validation');
            $table->string('avatar');
            $table->string('home')->default('www.example.com');
            $table->string('facebook')->default('facebook.com/example');
            $table->string('skype')->default('example.123');
            $table->string('spotify')->default('example11');
            $table->string('linkedin')->default('linkedin.com/example');
            $table->string('location')->default('Exampleton');
            $table->string('gender')->default('Male');
            $table->text('hobbies');
            $table->text('about');
            $table->text('signature');
            $table->integer('number')->default(0);
            $table->boolean('validated')->default(false);
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
        Schema::drop('users');
    }
}
