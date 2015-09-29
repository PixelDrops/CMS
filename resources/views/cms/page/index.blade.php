@extends('head')

@section('content')

    PAGES
    <br> <a href="create">Create new page</a>
    @foreach( $pages as $page)
        <article>
            {{$page->page_id}}
            <a href="{{ URL::to("page/$page->page_id")}}/">{{$page->title}}</a>
            <a href="page/{{$page->page_id}}/edit">{{$page->title}}</a>

        </article>
    @endforeach

@stop
