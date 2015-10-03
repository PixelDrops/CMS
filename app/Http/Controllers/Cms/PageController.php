<?php

namespace App\Http\Controllers\Cms;

use App\Enums\FieldOptionTypeEnum;
use App\FieldOption;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\PageRequest;
use App\Page;
use Carbon\Carbon;

class PageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $pages = Page::all();

        return view("cms.page.index", compact('pages'));
    }

    public function create() {

        $languages = FieldOption::type(FieldOptionTypeEnum::LANGUAGE);
        $pageStatus = FieldOption::type(FieldOptionTypeEnum::PAGE_STATUS);
        $pageVisibility = FieldOption::type(FieldOptionTypeEnum::PAGE_VISIBILITY);

        return view("cms.page.create", compact('languages', 'pageStatus', 'pageVisibility'));
    }

    public function store(PageRequest $request) {
        $input = $request->all();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = null;

        $Page = new Page();

        $Page->language = $input['language'];
        $Page->status = $input['status'];
        $Page->visibility = $input['visibility'];
        $Page->slug = $input['slug'];
        $Page->title = $input['title'];
        $Page->content = $input['content'];
        $Page->description = $input['description'];
        $Page->keyword = $input['keyword'];

        $Page->save();

        flash()->success("Your page has been created");

        return redirect('cms/page');
    }
}
