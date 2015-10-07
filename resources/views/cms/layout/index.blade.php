@extends('cms.head')

@section('content')



    <h2>Layout</h2>
    <a href="create">Create new Layout</a>
    <br><br>

    </div>
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
        @foreach( $Layouts as $Layout)
            <tr>
                <td>{{$Layout->layout_id}}</td>
                <td>{{$Layout->name}}</td>
                <td>{{$Layout->description}}</td>
                <td><a href="layout/{{$Layout->layout_id}}/edit">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>



@stop