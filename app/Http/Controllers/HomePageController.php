<?php

	namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Page;
	use Illuminate\Support\Facades\DB;

	class HomePageController extends Controller {

		public function index() {
			$page = $this->getPage('index');

			return view('home', compact('page'));
		}

		public function page($url) {
			$page = $this->getPage($url);


			return view('home', compact('page'));
		}

		private function getPage($url) {
			$where = DB::table('page')->where('slug', $url);
			if (! $where->exists()) {
				throw new NotFoundHttpException;
			}

			$page = $where->first();
			return $page;
		}
	}
