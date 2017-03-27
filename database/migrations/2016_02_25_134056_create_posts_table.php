<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title');
            $table->text('text');
            $table->string('forum');
            $table->integer('topic');
            $table->string('username');
            $table->boolean('first')->default(false);
            $table->string('icon');
            $table->timestamps();

            $table->foreign('topic')
                ->references('id')
                ->on('topics')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('forum')
                ->references('name')
                ->on('forums')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('username')
                ->references('username')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
