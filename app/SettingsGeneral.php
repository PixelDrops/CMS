<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsGeneral extends Model
{
    protected $table = 'settings_general';

    protected $primaryKey = 'settings_general_id';

    protected $fillable = ['page_title', 'page_url', 'meta_description', 'meta_keywords', 'site_open','unavailable_message'];

}
