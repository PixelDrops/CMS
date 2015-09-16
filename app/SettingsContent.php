<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SettingsContent extends Model {

    protected $table = 'settings_content';

    protected $primaryKey = 'settings_content_id';

    protected $fillable = ['active', 'header', 'footer', 'javascript', 'navigation','date_create'];

    protected $dates = ['date_create'];

    public $timestamps = false;


    public static function retrieveOrCreateActiveContent() {
        $content =  self::firstOrCreate(['active'=>'1']);
        if ($content->wasRecentlyCreated) {
            $content->active = true;
            $content->created_at = Carbon::now();
            $content->update();
        }
        return $content;
    }
}
