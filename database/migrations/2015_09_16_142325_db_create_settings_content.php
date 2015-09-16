<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbCreateSettingsContent extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('settings_content', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('settings_content_id');
            $table->boolean('active')->default(false);
            $table->text('header');
            $table->text('footer');
            $table->text('javascript');
            $table->text('navigation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('settings_content');
    }
}
