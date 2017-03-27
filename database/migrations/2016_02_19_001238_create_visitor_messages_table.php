<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username_from');
            $table->string('username_to');
            $table->text('text');
            $table->boolean('read')->default(false);
            $table->timestamps();

            $table->foreign('username_from')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('username_to')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visitor_messages');
    }
}
