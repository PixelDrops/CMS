<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>CMS - </title>

        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <link rel="stylesheet" href="{{ asset('/css/cms/bootstrap.min.css') }}">


        <script src="{{ asset('/js/cms/jquery.js') }}"></script>
        <script src="{{ asset('/js/cms/bootstrap.min.js') }}"></script>

        <style>
            body {
                padding-top: 5rem;
            }
            .starter-template {
                padding: 3rem 1.5rem;
                text-align: center;
            }
            #editor {
                position: absolute;
                top: 80px;
                bottom: 10px;
                left: 80px;
                right: 10px;
            }
        </style>
    </head>
    <body>
        @extends('cms.navbar')
        <div class="container">
            @include("flash::message")

            <div class="content">
                @yield('content')
            </div>
        </div>


        <script>
            $('#flash-overlay-modal').modal();
        </script>
    </body>
</html>
