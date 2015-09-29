<?php

use Illuminate\Database\Seeder;

class FieldOptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_option_type')->insert(
            [
                ['field_option_type_id'=>1,'name'=> 'Language', 'description'=>'The Page or Blog Post Language'],
                ['field_option_type_id'=>2,'name'=> 'Page Status', 'description'=>'The Page Status'],
                ['field_option_type_id'=>3,'name'=> 'Page Visibility', 'description'=>'The Page Visibility']
            ]
        );
    }
}
