<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class DbCreatePasswordResets extends Migration {

		public function up() {
			Schema::create('password_resets', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				$table->string('email')->index();
				$table->string('token')->index();
				$table->timestamp('created_at');
			});
		}

		public function down() {
			Schema::drop('password_resets');
		}
}
