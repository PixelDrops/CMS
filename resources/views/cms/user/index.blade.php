@extends('app')

@section('content')

All Users

    @foreach( $users as $user)
        <article>
            {{$user->user_id}} -
            {{$user->firstname}} -
            {{$user->lastname}} -
            {{$user->email}}
        </article>
    @endforeach
@stop
