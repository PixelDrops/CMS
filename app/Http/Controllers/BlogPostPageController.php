<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\BlogPost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class BlogPostPageController extends Controller {

	const MY_TITLE  = "{{%MY_TITLE%}}";

	const BLOG_POST_TITLE ='{{%BLOG_POST_TITLE%}}';
	const BLOG_POST_CONTENT ='{{%BLOG_POST_CONTENT%}}';
	const BLOG_POST_DATE = '{{%BLOG_POST_DATE%}}';
	const BLOG_POST_AUTHOR_NAME = '{{%BLOG_POST_AUTHOR_NAME%}}';
	const BLOG_POST_BREAK ='<p><!-- Blog Post Break --></p>';


	public static function createPageLayout($layoutContent, $slug) {
		$blogPost = self::retrieveBlogPostFromSlug($slug);

		$layoutContent = self::replaceLayoutTitle($layoutContent,$blogPost);
		$layoutContent = self::replaceLayoutBlogTitle($layoutContent,$blogPost);
		$layoutContent = self::replaceLayoutBlogPostContent($layoutContent, $blogPost);
		$layoutContent = self::replaceLayoutBlogCreateDate($layoutContent, $blogPost);
		$layoutContent = self::removeBlogPostBreak($layoutContent);

		return $layoutContent;
	}

	private static function retrieveBlogPostFromSlug($slug) {
		$blogPost = BlogPost::where('slug',$slug);
		if (!$blogPost->exists())
			return self::retrieveBlogPostFromId($slug);
		return $blogPost->first();
	}

	private static function retrieveBlogPostFromId($id) {
		$blogPost = BlogPost::where('blog_post_id',$id);

		if (!$blogPost->exists())
			Redirect::to('/')->send()->withErrors('Blog Post could not be found');

		return $blogPost->first();
	}

	private static function replaceLayoutTitle($layoutContent, $blogPost) {
		$title = $blogPost->title;

		if (strpos($layoutContent,HomePageController::MY_TITLE) !== false)
			return str_replace(HomePageController::MY_TITLE, ' - ' .$title, $layoutContent);
		return $layoutContent;
	}

	private static function replaceLayoutBlogTitle($layoutContent, $blogPost) {
		$title = $blogPost->title;

		if (strpos($layoutContent,BlogPostPageController::BLOG_POST_TITLE) !== false)
			return str_replace(BlogPostPageController::BLOG_POST_TITLE, $title, $layoutContent);
		return $layoutContent;
	}

	private static function replaceLayoutBlogPostContent($layoutContent, $blogPost) {
		$blogPostContent = $blogPost->content;

		if (strpos($layoutContent,BlogPostPageController::BLOG_POST_CONTENT) !== false)
			return str_replace(BlogPostPageController::BLOG_POST_CONTENT, $blogPostContent, $layoutContent);
		return $layoutContent;
	}

	private static function replaceLayoutBlogCreateDate($layoutContent, $blogPost) {
		$createdAt = $blogPost->created_at->format('M d,Y \a\t h:i a');
		$authorId=  $blogPost->author;
		$User = User::findOrNew($authorId);
		$name = $User->firstname . ' ' .$User->lastname;
		if (strpos($layoutContent,BlogPostPageController::BLOG_POST_DATE) !== false)
			$layoutContent = str_replace(BlogPostPageController::BLOG_POST_DATE, $createdAt, $layoutContent);
		if (strpos($layoutContent,BlogPostPageController::BLOG_POST_AUTHOR_NAME) !== false)
			$layoutContent = str_replace(BlogPostPageController::BLOG_POST_AUTHOR_NAME, $name, $layoutContent);
		return $layoutContent;
	}


	private static function removeBlogPostBreak($layoutContent) {
		if (strpos($layoutContent,BlogPostPageController::BLOG_POST_BREAK) !== false)
			return str_replace(BlogPostPageController::BLOG_POST_BREAK, '', $layoutContent);
		return $layoutContent;
	}
}