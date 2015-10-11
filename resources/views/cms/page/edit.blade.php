@extends('cms.head')

@section('content')


    <h1> Edit Page</h1>

    {!!Form::model($Page, ['method'=>'PATCH', 'action' => ['Cms\PageController@update', $Page->page_id]]) !!}
    @include('cms/page._form', ['buttonText'=>'Update Page'])
    {!!Form::close() !!}

@stop
