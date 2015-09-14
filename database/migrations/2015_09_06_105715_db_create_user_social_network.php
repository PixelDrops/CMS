<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbCreateUserSocialNetwork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_network', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user')->unsigned();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("youtube")->nullable();
            $table->string("google_plus")->nullable();
            $table->string("instagram")->nullable();
            $table->string("pinterest")->nullable();
            $table->string("flickr")->nullable();
            $table->string("personal_website")->nullable();
        });

        Schema::table('user_social_network', function ($table) {
            $table->primary('user');
            $table->foreign('user')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_social_network');
    }
}
