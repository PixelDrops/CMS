@extends('cms.head')


@section('content')

    <h1> Write Article</h1>

    {!!Form::open(['url'=>'cms/layout']) !!}
    <div class="form-group">
        {!!Form::label('name', 'Name: ') !!}
        {!!Form::text('name', null,['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('description', 'Description: ') !!}
        {!!Form::text('description', null,['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('content', 'Content: ') !!}
        {!!Form::textarea('content', null,['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Create Layout', ['class'=> 'btn btn-primary form-control']) !!}
    </div>
    {!!Form::close() !!}

    @include('errors.list')
@stop
