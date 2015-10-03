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

	public function show(SettingsContent $settingsContent) {
		return view("cms.settings.content", compact('settingsContent'));
	}

	public function store(SettingsContent $request) {
		$input = $request->all();
		dd('here');
		flash()->success("Your content has been created");

		return redirect('/cms/settings/content');
	}

	public function edit(SettingsContent $settingsContent) {
		return view('/cms/settings/content/edit', compact('settingsContent'));
	}

    public function update(SettingsContent $settingsContent, SettingsContentRequest $request) {
		$settingsContent->update($request->all());
        return redirect("/cms/settings/content");
    }
}
