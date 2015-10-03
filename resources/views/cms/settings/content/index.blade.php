@extends('cms.head')

@section('content')


    Settings Content


        <article>
            {{$settingsContent->settings_content_id}}
            <a href="/cms/settings/content/{{$settingsContent->settings_content_id}}/edit">Edit</a>

        </article>


@stop