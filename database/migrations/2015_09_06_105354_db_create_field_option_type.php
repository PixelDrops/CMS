<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DbCreateFieldOptionType extends Migration {
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('field_option_type', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('field_option_type_id')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();
        });

        Schema::table('field_option_type', function ($table) {
            $table->primary('field_option_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::drop('field_option_type');
    }
}