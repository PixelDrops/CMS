<?php

	namespace App\Http\Controllers\Cms;

	use App\Category;
	use App\Http\Controllers\Controller;
	use App\Http\Requests\CategoryRequest;
	use App\Library\SlugFactory;


	class CategoryController extends Controller {

		public function __construct() {
			$this->middleware('auth');
		}

		public function index() {
			$Categories = Category::retrieveBlogPost();

			return view("cms.blog.category.index", compact('Categories'));
		}

		public function create() {
			return view("cms.blog.category.create");
		}

		public function store(CategoryRequest $request) {
			$input = $request->all();

			$Category = new Category();
			$Category->name = $input['name'];
			$Category->url_friendly = SlugFactory::createUrlFriendly($input['name'], $input['url_friendly']);
			$Category->description = $input['description'];
			$Category->type = 'Blog Post';
			$Category->save();

			flash()->success("Category " . $Category->name . " has been created");
			return redirect('/cms/blog/category');
		}

		public function edit($categoryId) {
			$Category = Category::findOrNew($categoryId);

			return view('/cms/blog/category/edit', compact('Category'));
		}

		public function update($categoryId,CategoryRequest $request) {
			$Category = Category::findOrNew($categoryId);

			$input = $request->all();
			$Category->name = $input['name'];
			$Category->url_friendly = SlugFactory::createUrlFriendly($input['name'], $input['url_friendly']);
			$Category->description = $input['description'];
			$Category->save();
			return redirect('/cms/blog/category');
		}

		public function destroy($categoryId) {
			Category::destroy($categoryId);
			flash()->success("Category has been deleted");

		}
	}