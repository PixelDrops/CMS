<?php

	namespace App\Http\Controllers;

	use App\BlogPost;
	use App\Http\Requests;

	class BlogPostListingPageController extends Controller {

		// TODO Need to create a post template to be able to update this from the database
		// in order to display the posts in a specific layout

		const BLOG_LISTING = '/{{%BLOG_LISTING\[[a-z0-9:{},]+\]%}}/';
		const BLOG_DISPLAY_SIZE = '/{size:[\d]+}/'; // size: 5
		const BLOG_DISPLAY_CATEGORIES = '/{categories:[\d,]+}/'; // categories: 4,5,6
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

			return $this->pageLayoutContent;
		}

		private function retrieveBlogPostsWithPagination() {
			$BlogPosts = BlogPost::whereHas('categories', function ($query) {
				$categories = $this->findDisplayCategories();
				if (!is_null($categories))
					$query->whereIn('category_id', $this->findDisplayCategories());
			});

			$this->BlogPosts = $BlogPosts->paginate($this->findBlogSize());
		}

		private function findDisplayCategories() {
			preg_match(BlogPostListingPageController::BLOG_DISPLAY_CATEGORIES, $this->pageLayoutContent, $displaySizeCount);
			if (sizeof($displaySizeCount) == 0)
				return NULL;

			preg_match('/[\d,]+/', $displaySizeCount[0], $displaySizeMatch);

			// TODO perhaps add another check
			return array_map("intval", explode(",", $displaySizeMatch[0]));

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
			// TODO Create a an editable file for adding the blog post listing inorder to be easily updated
			$this->blogLayoutContent = '<div class="blog-post-listing">';
			foreach ($this->BlogPosts as $BlogPost) {
				$this->blogLayoutContent .= '<div class="blog-post">';
				$this->blogLayoutContent .= '<div class="blog-title"><a href="blog/' . $BlogPost->slug . '">' . $BlogPost->title . '</a></div>';
				$this->blogLayoutContent .= '<div class="blog-content">' . $this->removeContentAfterPostPageBreak($BlogPost->content) . '</div>';
				$this->blogLayoutContent .= '</div>';
			}
			$this->blogLayoutContent .= '</div>';
		}

		private function removeContentAfterPostPageBreak($content) {
			if (strpos($content, BlogPostListingPageController::BLOG_POST_BREAK) !== FALSE)
				return substr($content, 0, strpos($content, BlogPostListingPageController::BLOG_POST_BREAK));

			return $content;
		}
	}