<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\BlogPost;
use App\Http\Requests;
use App\Http\Requests\BlogPostRequest;
use App\Layout;
use Carbon\Carbon;

class BlogPostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
		var_dump($_SERVER['DOCUMENT_ROOT'].'/images/blog' );
        $BlogPosts = BlogPost::published();

        return view("cms.blog.index", compact('BlogPosts'));
    }

    public function create() {
		$layout = Layout::lists('name','layout_id');

        return view("cms.blog.create",compact('layout'));
    }

    public function store(BlogPostRequest $request) {
        $input = $request->all();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();

        $BlogPost = new BlogPost();
		$BlogPost->layout = $input['layout'];


		$BlogPost->slug = $input['slug'];
		$BlogPost->title = $input['title'];
        $BlogPost->content = $input['content'];
        $BlogPost->language = 5;
        $BlogPost->status = 5;
        $BlogPost->visibility = 5;
        // $BlogPost->author=$this->findUser()->user_id;
        $BlogPost->published_at = Carbon::createFromFormat('Y-m-d H:i', $input['published_at'] . ' ' . $input['published_at_time']);

       \Auth::user()->blogPosts()->save($BlogPost);
       flash()->success("Your blog post has been created");

        return redirect('/cms/blog');
    }

    public function edit(BlogPost $blogPost) {
		$layout = Layout::lists('name','layout_id');

		return view('/cms/blog/edit', compact('blogPost','layout'));
    }

    public function update(BlogPost $blogPost, BlogPostRequest $request) {
        $blogPost->update($request->all());
        return redirect('/cms/blog');
    }
}
