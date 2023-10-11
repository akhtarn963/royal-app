<!DOCTYPE html>
<html lang="en">

<head>
    <title>Royal Apps Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Royal-apps</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                @if(session('is_loggedin'))
                <li><a href="{{route('authors.index')}}">Authors</a></li>
                <li><a href="{{route('books.index')}}">Books</a></li>
                <li><a href="{{url('logout')}}">Logout</a></li>
                @else
                <li><a href="{{url('login')}}">Login</a></li>
                @endif
            </ul>
            @if(session('is_loggedin'))
            <div style="float:right; color:#FFF;">
                <h4>{{session('user_name')}}</h4>
            </div>
            @endif
        </div>
    </nav>