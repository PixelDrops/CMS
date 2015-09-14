<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DbCreateUserInformation extends Migration {
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('user_information', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user')->unsigned();
            $table->string("mobile_phone")->nullable();
            $table->string("home_phone")->nullable();
            $table->string("work_phone")->nullable();
            $table->string("company")->nullable();
            $table->string("personal_id")->nullable();
            $table->string("biography")->nullable();
            $table->string("jabber_gtalk")->nullable();
            $table->string("yahoo")->nullable();
            $table->string("aim")->nullable();
            $table->date("date_of_birth")->nullable();
        });

        Schema::table('user_information', function ($table) {
            $table->primary('user');
            $table->foreign('user')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::drop('user_information');
    }
}
