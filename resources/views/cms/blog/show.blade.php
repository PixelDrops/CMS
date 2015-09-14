@extends('app')

@section('content')

Blog Posts
{{ $blogPost->title}}

    <article>
        {{$blogPost->content}}
    </article>
@stop
