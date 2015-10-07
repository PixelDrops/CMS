<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbCreateUser extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->string('username')->nullable();
            $table->char('gender', 1);
            $table->char('title', 3)->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('display_name')->nullable();
            $table->string('personal_photo')->nullable();
            $table->string('email')->unique('email_unique');;
            $table->string('password', 60);
            $table->boolean('active')->default(true);
            $table->dateTime('last_logged_in');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('user')->insert(
            array(
                'gender'=> 'M',
                'email' => 'stevoo82@gmail.com',
                'password' => bcrypt('test'),
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('user');
    }
}
