<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class DbCreateCategory extends Migration {

		public function up() {
			Schema::create('category', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				$table->increments('category_id');
				$table->string('type');
				$table->string('name');
				$table->integer('parent')->unsigned();
				$table->string('url_friendly');
				$table->text('description');
			});

			Schema::table('category', function ($table) {
				$table->foreign('category_id')->references('category_id')->on('category')->onDelete('cascade');
			});
		}

		public function down() {
			Schema::drop('category');
		}
	}