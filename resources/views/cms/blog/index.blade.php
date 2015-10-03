@extends('cms.head')

@section('content')

    Blog Posts
    

    @foreach( $BlogPosts as $BlogPost)
        <article>
            {{$BlogPost->blog_post_id}}
            <a href="blog/{{$BlogPost->blog_post_id}}/">{{$BlogPost->title}}</a> <a href="/cms/blog/{{$BlogPost->blog_post_id}}/edit">Edit</a>

        </article>
    @endforeach
@stop
