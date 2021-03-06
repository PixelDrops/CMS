<?php

namespace App\Http\Controllers\Cms\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Validator;

class AuthController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = 'cms.dashboard';
	protected $redirectAfterLogout='cms/dashboard';

	// Login path is used in loginPath() to redirect if failed
	protected $loginPath = 'cms/auth/login';

    /**
     * Create a new authentication controller instance
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data) {
        return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:user',
			'password' => 'required|confirmed|min:6'
		]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data) {
        return User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => bcrypt($data['password']),]);
    }

	public function getLogin() {
		return view('cms.auth.login');
	}

}
