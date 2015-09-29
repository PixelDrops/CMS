<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(FieldOptionTypeSeeder::class);
        $this->call(FieldOptionSeeder::class);

        Model::reguard();
    }
}
