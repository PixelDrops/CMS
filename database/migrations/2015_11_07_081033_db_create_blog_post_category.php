<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class DbCreateBlogPostCategory extends Migration {

		public function up() {
			Schema::create('blog_post_category', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				$table->integer('blog_post')->unsigned();
				$table->integer('category')->unsigned();
			});

			Schema::table('blog_post_category', function ($table) {
				$table->foreign('blog_post')->references('blog_post_id')->on('blog_post')->onDelete('cascade');
				$table->foreign('category')->references('category_id')->on('category')->onDelete('cascade');
			});
		}

		public function down() {
			Schema::drop('blog_post_category');
		}
	}