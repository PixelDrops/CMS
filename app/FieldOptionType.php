<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldOptionType extends Model {

    protected $table = 'field_option_type';

    protected $primaryKey = 'field_option_type_id';

    protected $fillable = ['name', 'description'];

    protected $hidden = ['field_option_type_id'];

    public $timestamps = false;
}
