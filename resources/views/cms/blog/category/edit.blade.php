@extends('cms.head')

@section('content')

   <h1> Edit Category {{$Category->name}}</h1>

    @include('errors.list')
    {!!Form::model($Category, ['method'=>'PATCH', 'action' => ['Cms\CategoryController@update', $Category->category_id]]) !!}
        @include('cms/blog/category._form', ['buttonText'=>'Edit Category'])
    {!!Form::close() !!}


@stop
