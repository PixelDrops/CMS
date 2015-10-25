@extends('cms.head')

@section('content')

    <script type="text/javascript" src="{{ asset('/js/cms/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : "textarea",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            height: "500",

        });
    </script>

    <h1> Write Article</h1>

    {!!Form::open(['url'=>'cms/blog']) !!}
        @include('cms/blog._form', ['buttonText'=>'Add Blog Post'])
    {!!Form::close() !!}

    @include('errors.list')
@stop
