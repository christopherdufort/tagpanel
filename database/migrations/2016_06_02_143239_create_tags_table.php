<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('tag_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('title');
            $table->integer('category_id')->references('id')->on('categories');
            $table->string('tag_city');
            $table->string('tag_region');
            $table->string('tag_country');
            $table->string('place_id');
            $table->string('description');
            $table->integer('rating');
            $table->string('media_path');
            $table->integer('like_count');
            $table->integer('share_count');
            $table->boolean('active');
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
        Schema::drop('tags');
    }
}
