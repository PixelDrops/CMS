@extends('cms.head')

@section('content')

    PAGES
    <br> <a href="create">Create new page</a><br><br>
    <table style="width:100%;max-width: 100%;" data-sort="table">
        <thead >
            <tr>
                <th class="header headerSortDown">Order</th>
                <th class="header">Title</th>
                <th class="header">Slug</th>
                <th class="header">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $pages as $page)
                <tr>
                    <td>{{$page->page_id}}</td>
                    <td>{{$page->title}}</td>
                    <td>{{$page->slug}}</td>
                    <td><a href="{{$page->page_id}}/edit">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@stop