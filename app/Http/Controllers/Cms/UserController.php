<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Carbon\Carbon;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $users = User::all();

        return view("cms.user.index", compact('users'));
    }

    public function show(User $user) {
        return view("cms.user.show", compact("user"));
    }

    public function create() {
        return view("cms.user.create");
    }

    public function store(User $request) {
        $input = $request->all();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();
        $input['last_logged_in'] = Carbon::now();

        $User = User::create($input);
        return redirect('cms\user\{{User->user_id}}');
    }

}
