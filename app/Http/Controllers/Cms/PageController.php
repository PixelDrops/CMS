<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $BlogPosts = Page::published();

        return view("cms.blog.index", compact('BlogPosts'));
    }
}
