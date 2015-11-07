@extends('cms.head')

@section('content')

    Blog Post Category
    <br><a href="/cms/blog/category/create">Create New Category</a>

    @foreach( $Categories as $Category)
        <article>
            {{$Category->category_id}}
            {{$Category->name}}
            {{$Category->url_friendly}}
            <a href="/cms/blog/category/{{$Category->category_id}}/edit">Edit</a>
            <a href="/cms/blog/category/{{$Category->category_id}}/destroy" data-method="delete"
               rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete this entry</a>
        </article>
    @endforeach


@stop
