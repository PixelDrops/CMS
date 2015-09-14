<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldOption extends Model {
    protected $table = 'field_option';

    protected $primaryKey = 'option_id';

    protected $fillable = ['name','description','url_friendly','order','enabled'];']'

    protected $hidden = ['field_option_type','option_id'];

    public $timestamps = false;
}
