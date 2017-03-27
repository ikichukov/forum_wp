<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('username');
            $table->string('category');
            $table->string('forum');
            $table->integer('post_id');
            $table->integer('views')->default(0);
            $table->string('icon');
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users')->pnUpdate('cascade')->onDelete('cascade');
            $table->foreign('forum')->references('name')->on('forums')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category')->references('name')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics');
    }
}
