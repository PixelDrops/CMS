@extends('cms.head')

@section('content')

    <h1>Create Category</h1>

    {!!Form::open(['url'=>'cms/blog/category/']) !!}
        @include('cms/blog/category._form', ['buttonText'=>'Add Blog Post Category'])
    {!!Form::close() !!}

    @include('errors.list')
@stop
