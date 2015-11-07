<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class DbCreateSettingsGeneral extends Migration {

		public function up() {
			Schema::create('settings_general', function (Blueprint $table) {
				$table->engine = 'InnoDB';
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


		public function down() {
			Schema::drop('settings_general');
		}
	}