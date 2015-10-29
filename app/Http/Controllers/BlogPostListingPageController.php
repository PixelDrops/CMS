<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogPostListingPageController extends Controller {


	const MY_TITLE  = "{{%MY_TITLE%}}";

	const BLOG_POST_TITLE ='{{%BLOG_POST_LOOP%}}';
	const BLOG_POST_CONTENT ='{{%BLOG_POST_PAGINATION%}}';
	const BLOG_POST_BREAK ='<p><!-- Blog Post Break --></p>';


	public static function createBlogListingPage($layoutContent) {
		$BlogPosts = self::retrieveBlogPostsWithPagination();

		$layoutContent = self::replaceLayoutTitle($layoutContent);
		//$layoutContent = self::replaceLayoutBlogTitle($layoutContent,$blogPost);

		return $layoutContent;

	}

	public static function retrieveBlogPostsWithPagination() {
		// TODO Need to figure out how to update this from the CMS
		$BlogPosts = BlogPost::paginate(10);
		return $BlogPosts;
	}

	private static function replaceLayoutTitle($layoutContent) {
		if (strpos($layoutContent,HomePageController::MY_TITLE) !== false)
			return str_replace(HomePageController::MY_TITLE, '' , $layoutContent);
		return $layoutContent;
	}

}
