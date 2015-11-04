@extends('cms.head')

@section('content')

    <script type="text/javascript" src="{{ asset('/js/cms/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : "textarea",
            plugins : ["pagebreak advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link pagebreak image jbimages",
            elements : "pagebreak",
            height: "500",
            pagebreak_separator: "<!-- Blog Post Break -->",
            relative_urls: false
        });
    </script>

    <h1> Edit Blog Post {{$blogPost->title}}</h1>

    @include('errors.list')
    {!!Form::model($blogPost, ['method'=>'PATCH', 'action' => ['Cms\BlogPostController@update', $blogPost->blog_post_id]]) !!}
        @include('cms/blog._form', ['buttonText'=>'Edit Blog Post'])
    {!!Form::close() !!}


@stop
