<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\LayoutRequest;
use App\Layout;
use Carbon\Carbon;

class LayoutController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
		$Layouts = Layout::all();
        return view("cms.layout.index", compact('Layouts'));
    }

	public function create() {
		return view("cms.layout.create");
	}

	public function show(Layout $layout) {
		//dd($settingsContent);
		return view("cms.layout", compact('layout'));
	}

	public function store(LayoutRequest $request) {
		$input = $request->all();

		$layout = new Layout();
		$layout->name =$input['name'];
		$layout->description=$input['description'];
		$layout->content=$input['content'];
		$layout->created_at=Carbon::now();

		$layout->save();

		flash()->success("A new Website Layout has been created");
		return redirect('/cms/layout');
	}

	public function edit($layoutId) {
		$layout = Layout::findOrNew($layoutId);

		return view('/cms/layout/edit', compact('layout'));
	}

    public function update( $layoutId, LayoutRequest $request) {
		//dd($request->all());
		$layout = Layout::findOrNew($layoutId);
		$layout->update($request->all());
        return redirect("/cms/layout/");
    }
}