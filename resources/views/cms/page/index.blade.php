@extends('head')

@section('content')

    PAGES
    <br> <a href="create">Create new page</a>
    @foreach( $pages as $page)
        <article>
            {{$page->page_id}}
            <a href="page/{{$page->page_id}}/">{{$page->name}}</a>
            <a href="page/{{$page->page_id}}/edit">{{$page->name}}</a>

        </article>
    @endforeach

@stop
