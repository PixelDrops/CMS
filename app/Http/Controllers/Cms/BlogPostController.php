<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\BlogPost;
use App\Http\Requests;
use App\Http\Requests\BlogPostRequest;
use Carbon\Carbon;

class BlogPostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $BlogPosts = BlogPost::published();

        return view("cms.blog.index", compact('BlogPosts'));
    }

    public function show(BlogPost $blogPost) {
        return view("cms.blog.show", compact('blogPost'));
    }

    public function create() {
        return view("cms.blog.create");
    }

    public function store(BlogPostRequest $request) {
        $input = $request->all();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();

        $BlogPost = new BlogPost();
        $BlogPost->title = $input['title'];
        $BlogPost->content = $input['content'];
        $BlogPost->language = 1;
        $BlogPost->status = 1;
        $BlogPost->visibility = 1;
        // $BlogPost->author=$this->findUser()->user_id;
        $BlogPost->published_at = Carbon::createFromFormat('Y-m-d H:i', $input['published_at'] . ' ' . $input['published_at_time']);

       \Auth::user()->blogPosts()->save($BlogPost);
       flash()->overlay("GG","Your blog post has been created");



        return redirect('cms\blog');
    }

    public function edit(BlogPost $blogPost) {
        return view('cms.blog.edit', compact('blogPost'));
    }

    public function update(BlogPost $blogPost, BlogPostRequest $request) {

        $blogPost->update($request->all());
        return redirect('cms\blog');
    }
}
