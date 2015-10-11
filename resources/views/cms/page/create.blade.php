@extends('cms.head')

@section('content')

    <h1>Create New Page</h1>

    @include('errors.list')
    {!!Form::open(['url'=>'cms/page']) !!}
    @include('cms/page._form', ['buttonText'=>'Add New Page'])
    {!!Form::close() !!}

@stop
