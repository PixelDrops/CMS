<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbCreateBlogPost extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('blog_post', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('blog_post_id');
            $table->integer('language')->unsigned();
            $table->integer('parent_post')->unsigned()->nullable();
            $table->integer('author')->unsigned()->nullable();
            $table->integer('status')->unsigned();
            $table->integer('visibility')->unsigned();
			$table->integer('layout')->unsigned();
			$table->string('slug');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->longText('content');
            $table->boolean('comment_enabled')->default(true);
            $table->dateTime('published_at');
            $table->timestamps();
        });

        Schema::table('blog_post', function ($table) {
            $table->foreign('language')->references('field_option_id')->on('field_option')->onDelete("restrict");
            $table->foreign('parent_post')->references('blog_post_id')->on('blog_post')->onDelete("set null");
            $table->foreign('author')->references('user_id')->on('user')->onDelete("set null");
            $table->foreign('status')->references('field_option_id')->on('field_option')->onDelete("restrict");
            $table->foreign('visibility')->references('field_option_id')->on('field_option')->onDelete("restrict");
			$table->foreign('layout')->references('layout_id')->on('layout')->onDelete("restrict");
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('blog_post');
    }
}
