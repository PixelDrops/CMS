<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DbCreateFieldOption extends Migration {
    /**
     * Run the migrations.

     */
    public function up() {
        Schema::create('field_option', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('field_option_id');
            $table->integer('field_option_type')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('url_friendly')->nullable();
            $table->smallInteger('order')->nullable();
            $table->boolean('enabled')->default(true);
        });

        Schema::table('field_option', function ($table) {
            $table->foreign('field_option_type')->references('field_option_type_id')->on('field_option_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::drop('field_option');
    }
}
