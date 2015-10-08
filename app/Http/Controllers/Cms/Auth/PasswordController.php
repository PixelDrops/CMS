<?php

namespace App\Http\Controllers\Cms\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

	protected $redirectTo = 'cms/dashboard';


    public function __construct() {
        $this->middleware('guest');
    }

	public function getEmail() {
		return view('cms.email.password');
	}


	public function getReset($token = null)
	{
		if (is_null($token)) {
			throw new NotFoundHttpException;
		}

		return view('cms.auth.reset')->with('token', $token);
	}
}