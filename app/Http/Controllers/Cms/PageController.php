<?php

namespace App\Http\Controllers\Cms;

use App\Http\Requests;
use App\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $pages = Page::all();

        return view("cms.page.index", compact('pages'));
    }

    public function create() {
        return view("cms.page.create");
    }

    public function store(Page $request) {
        $input = $request->all();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = null;

        $Page = new Page();
        $Page->save();

        flash()->success("Your page has been created");

        return redirect('cms\page');
    }

}
