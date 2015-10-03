@extends('cms.head')

@section('content')

    <h1> Edit User Post {{$user->user_id}}</h1>

    @include('errors.list')
    {!!Form::model($user, ['method'=>'PATCH', 'action' => ['Cms\UserController@update', $user->user_id]]) !!}
    @include('cms/user._form', ['buttonText'=>'Edit User', 'showPassword'=>false])
    {!!Form::close() !!}


@stop
