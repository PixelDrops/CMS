@extends('cms.head')

@section('content')


    <h1>Settings Content</h1>

    @include('errors.list')
    {!!Form::model($settingsContent, ['method'=>'PATCH', 'action' => ['Cms\SettingsContentController@update', $settingsContent->settings_content_id]]) !!}

    <div class="form-group">
        {!!Form::label('header', 'Header: ') !!}
        {!!Form::text('header', null,['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('navigation', 'Navigation: ') !!}
        {!!Form::text('navigation', null,['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('footer', 'Footer: ') !!}
        {!!Form::text('footer', null,['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('javascript', 'Javascript: ') !!}
        {!!Form::text('javascript', null,['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Update Website Content', ['class'=> 'btn btn-primary form-control']) !!}
    </div>
    {!!Form::close() !!}
@stop
