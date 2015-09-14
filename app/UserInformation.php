<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model {

    protected $primaryKey = 'user';

    protected $table = 'user_information';

    protected $fillable = ['mobile_phone', 'home_phone','work_phone','company','personal_id','biography','jabber_gtalk','yahoo','aim','date_of_birth'];

    protected $hidden = ['user'];

    public $timestamps = false;

}
