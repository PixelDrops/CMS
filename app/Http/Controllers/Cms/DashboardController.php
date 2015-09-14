<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class DashboardController extends Controller {

    public function index() {
        return view("cms.dashboard");
    }
}
