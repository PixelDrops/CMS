<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialInformation extends Model
{
    protected $primaryKey = 'user';

    protected $table = 'user_social_information';

    protected $fillable = ['facebook', 'twitter','linkedin','youtube','google_plus','instagram','pinterest','flickr','personal_website'];

    protected $hidden = ['user'];

    public $timestamps = false;

}
