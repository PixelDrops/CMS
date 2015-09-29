<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldOption extends Model {

    protected $table = 'field_option';

    protected $primaryKey = 'field_option_id';

    protected $fillable = ['name','description','url_friendly','order','enabled'];

    protected $hidden = ['field_option_type','field_option_id'];

    public $timestamps = false;


    public static function type($type) {
        return FieldOption::where('field_option_type', $type)->orderBy('order')->lists('name','field_option_id');
    }
}
