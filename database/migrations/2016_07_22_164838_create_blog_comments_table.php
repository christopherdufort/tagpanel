<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Each record in this table will be a single comment tied to a specific blog.
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id')->references('blog_id')->on('blogs');
            $table->integer('author_id')->references('id')->on('users');
            $table->string('comment');
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
        Schema::drop('blog_comments');
    }
}
