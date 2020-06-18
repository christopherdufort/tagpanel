<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->integer('author_id')->references('id')->on('users');
            $table->string('title');
            $table->integer('category_id')->references('id')->on('blog_categories');
            $table->string('main_idea');
            $table->string('description');
            $table->string('media_path');
            $table->integer('like_count');
            $table->integer('share_count');
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
        chema::drop('blogs');
    }
}
