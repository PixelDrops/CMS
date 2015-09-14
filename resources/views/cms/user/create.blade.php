@extends('app')

@section('content')

    <h1> Create new User</h1>


    {!!Form::open(['url'=>'cms/user']) !!}
        @include('errors.list')
        @include('cms/user._form', ['buttonText'=>'Create new user'])
    {!!Form::close() !!}

@stop
