<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>CMS - </title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <style>
        body {
            padding-top: 5rem;
        }
        .content {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    @include("flash::message")

    <div class="content">

        <form method="POST" action="/cms/auth/login">
            {!! csrf_field() !!}

            <div>
                Email
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input type="password" name="password" id="password">
            </div>

            <div>
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            <a href="/cms/password/email">Forgot Password</a>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
<script>
    $('#flash-overlay-modal').modal();
</script>
</body>
</html>

