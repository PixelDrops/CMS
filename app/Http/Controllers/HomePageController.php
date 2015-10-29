<?php

	namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Layout;
	use App\Page;

	class HomePageController extends Controller {

		const MY_TITLE  = "{{%MY_TITLE%}}";
		const PAGE_CONTENT  = "{{%PAGE_CONTENT%}}";
		const PAGE_SPECIFIC_JAVASCRIPT  = "{{%JAVASCRIPT%}}";
		const SLUG_REPLACE = '%SLUG_REPLACE%';
		const ACTIVE_PAGE = '{{%S[%SLUG_REPLACE%]%}}';
		const REGEX_ACTIVE_PAGE = '/{\{%S\[(\w+)\]%\}\}/';

		public function index() {
			return $this->page('index');
		}

		public function page($url) {
			$layoutContent = $this->createPageLayout($url);

			return view('home', compact('layoutContent','page'));
		}

		public function blog($slug) {
			$layoutContent = $this->createPageLayout('blog');
			$layoutContent = BlogPostPageController::createPageLayout($layoutContent, $slug);
			return view('post', compact('layoutContent'));
		}

		public function blogListing() {
			$layoutContent = $this->createPageLayout('blog-post-listing');
			$layoutContent = BlogPostListingPageController::createBlogListingPage($layoutContent);
			return view('post_listing', compact('layoutContent'));

		}

		private function createPageLayout($url) {
			$page = $this->retrievePage($url);
			$layout = $this->retrievePageLayout($page);

			$layoutContent = $this->replaceLayoutTitle($layout,$page,$url);
			$layoutContent = $this->replaceActiveContentPage($layoutContent,$page);
			$layoutContent = $this->replaceLayoutPageContent($layoutContent, $page);
			$layoutContent = $this->replacePageJavascriptContent($layoutContent, $page);
			return $layoutContent;
		}

		private function retrievePage($url) {
			$where = Page::where('slug', $url);
			if (! $where->exists()) {
				throw new NotFoundHttpException;
			}

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
			$content = $layout->content;

			// Do replace the title for the blog. Let it to be replaces by the blog title
			if (strpos($content,HomePageController::MY_TITLE) !== false && $url != 'blog' && $url != 'blog-post-listing')
				return str_replace(HomePageController::MY_TITLE, $title, $content);
			return $content;
		}

		private function replaceActiveContentPage($layoutContent,$page) {
			$slug = $page->slug;
			$activePage = str_replace(HomePageController::SLUG_REPLACE, $slug, HomePageController::ACTIVE_PAGE);
			$layoutContent = str_replace($activePage, 'class="active"', $layoutContent);
			return preg_replace(HomePageController::REGEX_ACTIVE_PAGE, ' ', $layoutContent);
		}

		private function replaceLayoutPageContent($layoutContent, $page) {
			$pageContent = $page->content;

			if (strpos($layoutContent,HomePageController::PAGE_CONTENT) !== false)
				return str_replace(HomePageController::PAGE_CONTENT, $pageContent, $layoutContent);
			return $layoutContent;
		}

		private function replacePageJavascriptContent($layoutContent, $page) {
			$javascriptContent = $page->javascript;
			if (strpos($layoutContent,HomePageController::PAGE_SPECIFIC_JAVASCRIPT) !== false)
				return str_replace(HomePageController::PAGE_SPECIFIC_JAVASCRIPT, $javascriptContent, $layoutContent);
			return $layoutContent;
		}
	}
