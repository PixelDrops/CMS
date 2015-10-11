<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbCreateLayout extends Migration {

    public function up() {
		Schema::create('layout', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('layout_id');
			$table->text('name');
			$table->text('description');
			$table->text('content');
			$table->timestamps();
		});
    }

    public function down() {
		Schema::drop('layout');
    }
}
