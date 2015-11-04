<?php

	namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Layout;
	use App\Page;
	use Illuminate\Support\Facades\View;

	class HomePageController extends Controller {

		const MY_TITLE  = "{{%MY_TITLE%}}";
		const PAGE_CONTENT  = "{{%PAGE_CONTENT%}}";
		const PAGE_SPECIFIC_JAVASCRIPT  = "{{%JAVASCRIPT%}}";
		const SLUG_REPLACE = '%SLUG_REPLACE%';
		const ACTIVE_PAGE = '{{%S[%SLUG_REPLACE%]%}}';
		const REGEX_ACTIVE_PAGE = '/{\{%S\[(\w+)\]%\}\}/';

		private $pageLayoutContent;

		public function index() {
			return $this->page('index');
		}

		public function page($url) {
			$this->createPageLayout($url);
			return View::make('home')->with([
				'pageLayoutContent'=>$this->pageLayoutContent
			]);
		}

		public function blog($slug) {
			$this->createPageLayout('blog');

			$this->pageLayoutContent = BlogPostPageController::createPageLayout($this->pageLayoutContent, $slug);

			return View::make('post')->with([
				'blogLayoutContent'=>$this->pageLayoutContent
			]);
		}


		private function createPageLayout($url) {
			$page = $this->retrievePage($url);

			$layout = $this->retrievePageLayout($page);

			$this->replaceLayoutTitle($layout,$page,$url);
			$this->replaceActiveContentPage($page);
			$this->replaceLayoutPageContent($page);
			$this->replacePageJavascriptContent($page);
			$this->createBlogListing();

		}

		private function retrievePage($url) {
			$where = Page::where('slug', $url);

			if (! $where->exists())
				throw new NotFoundHttpException;

			$page = $where->first();
			return $page;
		}

		private function retrievePageLayout($page) {
			$layoutId = $page->layout;

			$layout = Layout::where('layout_id',$layoutId)->first();
			return $layout;
		}

		private function replaceLayoutTitle($layout, $page,$url) {
			$title = $page->title;
			$this->pageLayoutContent = $layout->content;
			// Do replace the title for the blog. Let it to be replaces by the blog title
			if (strpos($this->pageLayoutContent, HomePageController::MY_TITLE) !== FALSE && $url != 'blog' && $url != 'blog-post-listing')
				$this->pageLayoutContent = str_replace(HomePageController::MY_TITLE, $title, $this->pageLayoutContent);
		}

		private function replaceActiveContentPage($page) {
			$slug = $page->slug;
			$activePage = str_replace(HomePageController::SLUG_REPLACE, $slug, HomePageController::ACTIVE_PAGE);
			$this->pageLayoutContent = str_replace($activePage, ' class="active"', $this->pageLayoutContent);
			$this->pageLayoutContent = preg_replace(HomePageController::REGEX_ACTIVE_PAGE, '', $this->pageLayoutContent);
		}

		private function replaceLayoutPageContent($page) {
			$pageContent = $page->content;

			if (strpos($this->pageLayoutContent,HomePageController::PAGE_CONTENT) !== false)
				$this->pageLayoutContent = str_replace(HomePageController::PAGE_CONTENT, $pageContent, $this->pageLayoutContent);
		}

		private function replacePageJavascriptContent($page) {
			$javascriptContent = $page->javascript;
			if (strpos($this->pageLayoutContent,HomePageController::PAGE_SPECIFIC_JAVASCRIPT) !== false)
				$this->pageLayoutContent = str_replace(HomePageController::PAGE_SPECIFIC_JAVASCRIPT, $javascriptContent, $this->pageLayoutContent);
		}

		private function createBlogListing() {
			$Controller = new BlogPostListingPageController($this->pageLayoutContent);
			$this->pageLayoutContent = $Controller->createBlogListingPage();

		}
	}