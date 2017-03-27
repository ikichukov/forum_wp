<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('category');
            $table->integer('post_id');
            $table->string('glyphicon')->default('file');
            $table->timestamps();

            $table->primary('name');
            $table->foreign('category')
                ->references('name')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forums');
    }
}
