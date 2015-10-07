@extends('cms.head')

@section('content')

    <h1> Edit Blog Post {{$blogPost->title}}</h1>

    @include('errors.list')
    {!!Form::model($blogPost, ['method'=>'PATCH', 'action' => ['Cms\BlogPostController@update', $blogPost->blog_post_id]]) !!}
        @include('cms/blog._form', ['buttonText'=>'Edit Blog Post'])
    {!!Form::close() !!}


@stop
