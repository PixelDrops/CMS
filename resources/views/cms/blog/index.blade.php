@extends('cms.head')

@section('content')

    Blog Posts
    <br><a href="/cms/blog/create">Create New Blog Post</a>
     - <a href="/cms/blog/category">Categories</a>

    @foreach( $BlogPosts as $BlogPost)
        <article>
            {{$BlogPost->blog_post_id}}
            {{$BlogPost->title}}
            <a href="/cms/blog/{{$BlogPost->blog_post_id}}/edit">Edit</a>
            <a href="/blog/{{$BlogPost->slug}}">View</a>
        </article>
    @endforeach
@stop
