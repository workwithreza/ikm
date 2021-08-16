<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPBD | Login</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="{{ asset('image/BPBD.png') }}" type="image/icon type">
    <style>
        .error-message{
            color: red;
            position: relative;
            top: -40px;
        }

        .alert, .alert-danger{
            position: relative;
            top: -30px;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-dark">
    <div class="box">
        <div class="box-header">
            <div class="logo">
                <img src="image/BPBD.png" alt="Logo BPBD" width="100">
                <img src="image/jabar.png" alt="Logo JABAR" width="150">
            </div>
            <h1>Sign In</h1>
        </div>
        <div class="box-body">
            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            <form action="{{ route('check') }}" method="post">
                @csrf
                <input type="text" name="username" placeholder="User Name" autocomplete="off" value={{ old('username') }}>
                <span class="error-message">@error('username'){{ $message }}@enderror</span>
                <input type="password" name="password" placeholder="Password">
                <span class="error-message">@error('password'){{ $message }}@enderror</span>
                <input type="submit" value="LOGIN" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>
