<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;

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

    public function store(UserRequest $request) {
        $input = $request->all();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();
        $input['last_logged_in'] = Carbon::now();

        $User = new User();
        $User->username = $input['username'];
        $User->gender = $input['gender'];
        $User->title = $input['title'];
        $User->firstname = $input['firstname'];
        $User->lastname = $input['lastname'];
        $User->display_name = $input['display_name'];
        if (array_key_exists('personal_photo', $input)) {
            $User->personal_photo = $input['personal_photo'];
        }
        $User->email = $input['email'];

        $User->password = bcrypt($input['password']);
        $User->active = $input['active'];
        $User->last_logged_in = $input['last_logged_in'];

        $User->save();
        flash()->success("A new user[".$User->firstname." ".$User->lastname."] have been created");
        return redirect('cms/user/');
    }

    public function edit(User $user) {
        return view('cms.user.edit', compact('user'));
    }

    public function update(User $user, UserRequest $userRequest) {
        // TODO Ignore password change on update if password is not filled

        $user->update($userRequest->all());
        return redirect('cms/user');
    }
}
