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


		DB::table('field_option_type')->insert(
			array(
				['field_option_type_id'=> 1,'name' => 'Language'],
				['field_option_type_id'=> 2,'name' => 'Page Status'],
				['field_option_type_id'=> 3,'name' => 'Visibility'],
			)
		);
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::drop('field_option_type');
    }
}