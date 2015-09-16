@extends('head')

@section('content')

All Users

    <a href="create">Create User</a>
    @foreach( $users as $user)
        <article>
            {{$user->user_id}} -
            {{$user->firstname}} -
            {{$user->lastname}} -
            {{$user->email}} - <a href="{{$user->user_id}}/edit">Edit</a>
        </article>
    @endforeach
@stop
