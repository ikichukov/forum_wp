<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('friend1');
            $table->string('friend2');
            $table->boolean('accepted')->default(false);
            $table->timestamps();

            $table->foreign('friend1')->references('username')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('friend2')->references('username')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friends');
    }
}
