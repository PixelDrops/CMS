@extends('app')

@section('content')

    <h1> Write Article</h1>

    {!!Form::open(['url'=>'cms/blog']) !!}
        @include('cms/blog._form', ['buttonText'=>'Add Blog Post'])
    {!!Form::close() !!}

    @include('errors.list')
@stop
