<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'user';

    protected $primaryKey = 'user_id';

    protected $fillable = ['username', 'gender', 'title', 'firstname', 'lastname', 'display_name', 'personal_photo',
        'email', 'password', 'active','last_logged_in'];

    protected $hidden = ['user_id'];

    protected $dates = ['last_logged_in'];


    public function blogPosts() {
        return $this->hasMany('App\BlogPost', 'author', 'user_id');
    }


}