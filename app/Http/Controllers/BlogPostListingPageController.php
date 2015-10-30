<?php

	namespace App\Http\Controllers;

	use App\BlogPost;
	use App\Http\Requests;

	class BlogPostListingPageController extends Controller {

		// TODO Need to create a post template to be able to update this from the database
		// in order to display the posts in a specific layout

		const BLOG_LISTING = '/{{%BLOG_LISTING\[[a-z0-9:{}]+\]%}}/';
		const BLOG_DISPLAY_SIZE = '/{size:[\d]+}/';
		const BLOG_POST_BREAK = '<p><!-- Blog Post Break --></p>';

		private $BlogPosts;
		private $pageLayoutContent;
		private $blogLayoutContent;

		function __construct($pageLayoutContent) {
			$this->pageLayoutContent = $pageLayoutContent;
		}

		public function createBlogListingPage() {
			if (preg_match(BlogPostListingPageController::BLOG_LISTING, $this->pageLayoutContent) == FALSE)
				return $this->pageLayoutContent;

			$this->retrieveBlogPostsWithPagination();
			$this->createBlogPost();
			$this->pageLayoutContent = preg_replace(BlogPostListingPageController::BLOG_LISTING, $this->blogLayoutContent, $this->pageLayoutContent);

			//$layoutContent = self::replaceLayoutTitle($layoutContent);
			//$layoutContent = self::replaceLayoutBlogTitle($layoutContent,$blogPost);

			return $this->pageLayoutContent;
		}

		private function retrieveBlogPostsWithPagination() {
			// TODO Need to figure out how to update this from the CMS
			$this->BlogPosts = BlogPost::paginate($this->findBlogSize());
		}

		private function findBlogSize() {
			preg_match(BlogPostListingPageController::BLOG_DISPLAY_SIZE, $this->pageLayoutContent, $displaySizeCount);
			if (sizeof($displaySizeCount) == 0)
				return 5;
			preg_match('/[\d]+/', $displaySizeCount[0], $displaySizeMatch);

			if (sizeof($displaySizeMatch) == 0)
				return 5;

			return intval($displaySizeMatch[0]);
		}

		private function createBlogPost() {
			var_dump(sizeof($this->BlogPosts));
			$this->blogLayoutContent = '<div class="blog-post">';
			foreach ($this->BlogPosts as $BlogPost) {
				$this->blogLayoutContent .= '<div class="blog-title">'.$BlogPost->title.'</div>';
				$this->blogLayoutContent .= '<div class="blog-content">'.$BlogPost->content.'</div>';
			}
			$this->blogLayoutContent .= '</div>';
			// $this->blogLayoutContent .= '{!! $this->BlogPosts->render() !!}';
		}
	}