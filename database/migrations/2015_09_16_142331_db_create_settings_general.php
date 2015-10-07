<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbCreateSettingsGeneral extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('settings_general', function (Blueprint $table) {
            $table->increments('settings_general_id');
            $table->text('page_title');
            $table->text('homepage');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->text('site_open');
			$table->text('author');
            $table->text('unavailable_message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('settings_general');
    }
}
