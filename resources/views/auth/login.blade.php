<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .nav-link {
            font-size: 20px;
        }

        .form-group {
            font-size: 20px;
        }

        h1 {
            font-size: 30px;
            margin: 10px;
            font-weight: bold;
        }

        .btn-lg {
            width: 40%;
        }

        .alert-danger {
            font-size: 12px;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light collapse navbar-collapse">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item active ml-4"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    <li class="nav-item ml-4"><a class="nav-link" href="{{ url('/address') }}"> Address Lookup</a></li>
                    <li class="nav-item ml-4"><a class="nav-link" href="{{route('logout')}}"><span
                                class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><span
                                class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><span
                                    class="glyphicon glyphicon-user"></span>Register</a></li>
                    @endif
                @endauth
            @endif
        </ul>

    </div>
</nav>
<br>
<h1 class="text-center"> Login Form </h1>
<br>

<body>
@if(session('message'))
    <div class="alert alert-danger text-center">
        {{ session('message') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" id="email"
                           placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" id="password"
                           placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if(session('password'))
                        <div class="alert alert-danger text-center">
                            {{ session('password') }}
                        </div>
                    @endif
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
