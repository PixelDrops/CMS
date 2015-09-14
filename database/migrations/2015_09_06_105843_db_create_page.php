<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DbCreatePage extends Migration {
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('page', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('page_id');
            $table->integer('language')->unsigned();
            $table->integer('parent_page')->unsigned()->nullable();
            $table->integer('author')->unsigned()->nullable();
            $table->integer('status')->unsigned();
            $table->integer('visibility')->unsigned();
            $table->string('slug');
            $table->string('title');
            $table->longText('content');
            $table->mediumText('description');
            $table->mediumText('keyword');
            $table->timestamps();
        });

        Schema::table('page', function ($table) {
            $table->foreign('language')->references('field_option_id')->on('field_option')->onDelete("restrict");
            $table->foreign('parent_page')->references('page_id')->on('page')->onDelete("set null");
            $table->foreign('author')->references('user_id')->on('user')->onDelete("set null");
            $table->foreign('status')->references('field_option_id')->on('field_option')->onDelete("restrict");
            $table->foreign('visibility')->references('field_option_id')->on('field_option')->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::drop('page');
    }
}
