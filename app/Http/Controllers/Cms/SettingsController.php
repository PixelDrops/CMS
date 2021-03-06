<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view("cms.settings.index");
    }
}
