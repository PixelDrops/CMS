@extends('cms.head')

@section('content')

All Users

    <a href="user/create">Create User</a>
    @foreach( $users as $user)
        <article>
            {{$user->user_id}} -
            {{$user->firstname}} -
            {{$user->lastname}} -
            {{$user->email}} - <a href="user/{{$user->user_id}}/edit">Edit</a>
        </article>
    @endforeach
@stop
