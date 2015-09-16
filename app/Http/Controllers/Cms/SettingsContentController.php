<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\SettingsContentRequest;
use App\SettingsContent;

class SettingsContentController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $settingsContent = SettingsContent::retrieveOrCreateActiveContent();
        return view("cms.settings.content.index", compact('settingsContent'));
    }

    public function update(SettingsContent $blogPost, SettingsContentRequest $request) {

        $blogPost->update($request->all());
        return redirect("cms/settings/content");
    }
}
