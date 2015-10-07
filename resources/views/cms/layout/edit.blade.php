@extends('cms.head')

@section('content')



    <h1> Edit Layout</h1>
    <style type="text/css" media="screen">
        .code-editor {
            position: relative;
            height: 200px;
        }
        #editor {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>

    @include('errors.list')
    {!!Form::model($layout, ['method'=>'PATCH', 'action' => ['Cms\LayoutController@update', $layout->layout_id]]) !!}
        <div class="form-group">
            {!!Form::label('name', 'Name: ') !!}
            {!!Form::text('name', null,['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!!Form::label('description', 'Description: ') !!}
            {!!Form::text('description', null,['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!!Form::submit('Update Layout', ['class'=> 'btn btn-primary form-control']) !!}
        </div>
        <div class="form-group code-editor">
            {!!Form::editor('content', $layout->content) !!}
        </div>


    {!!Form::close() !!}

    <script src="http://ace.c9.io/build/src/ace.js" type="text/javascript" charset="utf-8"></script>

    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.getSession().setMode("ace/mode/php");
    </script>
@stop

