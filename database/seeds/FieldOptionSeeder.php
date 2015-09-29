<?php

use Illuminate\Database\Seeder;

class FieldOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_option')->insert(
            [
                ['field_option_type'=> '1', 'name'=>'British English'],
                ['field_option_type'=> '1', 'name'=>'Greek'],

                ['field_option_type'=> '2', 'name'=>'Draft'],
                ['field_option_type'=> '2', 'name'=>'Pending Review'],
                ['field_option_type'=> '2', 'name'=>'Published'],
                ['field_option_type'=> '2', 'name'=>'Users'],
                ['field_option_type'=> '2', 'name'=>'Trash'],

                ['field_option_type'=> '3', 'name'=>'Public'],
                ['field_option_type'=> '3', 'name'=>'Registered'],
                ['field_option_type'=> '3', 'name'=>'Private'],
            ]
        );
    }
}
