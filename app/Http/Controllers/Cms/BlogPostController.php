<?php

	namespace App\Http\Controllers\Cms;

	use App\BlogPost;
	use App\Category;
	use App\Http\Controllers\Controller;
	use App\Http\Requests\BlogPostRequest;
	use App\Layout;
	use App\Library\SlugFactory;
	use Carbon\Carbon;

	class BlogPostController extends Controller {

		public function __construct() {
			$this->middleware('auth');
		}

		public function index() {
			$BlogPosts = BlogPost::published();

			return view("cms.blog.index", compact('BlogPosts'));
		}

		public function create() {
			$layout = Layout::lists('name', 'layout_id');
			$Categories = $this->getAllBlogPostCategories();
			$SelectedCategories = null;
			return view("cms.blog.create", compact('layout','Categories', 'SelectedCategories'));
		}

		public function store(BlogPostRequest $request) {
			$input = $request->all();
			$input['created_at'] = Carbon::now();
			$input['updated_at'] = Carbon::now();

			$BlogPost = new BlogPost();
			$BlogPost->layout = $input['layout'];
			$BlogPost->title = $input['title'];
			$BlogPost->slug = SlugFactory::createUrlFriendly($BlogPost->title, $input['slug']);
			$BlogPost->content = $input['content'];
			$BlogPost->language = 5;
			$BlogPost->status = 5;
			$BlogPost->visibility = 5;
			$BlogPost->published_at = Carbon::createFromFormat('Y-m-d H:i', $input['published_at'] . ' ' . $input['published_at_time']);

			\Auth::user()->blogPosts()->save($BlogPost);
			if ($request->get('categories') != null)
				$BlogPost->categories()->attach($request->get('categories'));


			flash()->success("Your blog post has been created");
			return redirect('/cms/blog');
		}

		public function edit(BlogPost $blogPost) {
			$layout = Layout::lists('name', 'layout_id');
			$Categories = $this->getAllBlogPostCategories();
			$SelectedCategories = $blogPost->categories()->lists('category')->toArray();

			return view('/cms/blog/edit', compact('blogPost', 'layout', 'Categories', 'SelectedCategories'));
		}

		public function update(BlogPost $blogPost, BlogPostRequest $request) {
			$blogPost->update($request->all());
			flash()->success("Blog Post has been updated");
			return redirect('/cms/blog');
		}

		private function getAllBlogPostCategories() {
			return Category::type('Blog Post');
		}
}