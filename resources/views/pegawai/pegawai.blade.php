<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard_user.css') }}">
    <link rel="icon" href="{{ asset('image/BPBD.png') }}" type="image/icon type">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <div class="navigation">
                <a href="{{ route('user.dashboard') }}" class="d-flex" style="margin-bottom: -20px;">
                    <img src="{{ asset('image/BPBD.png') }}" style="margin-right: 10px;" width="40" height="40">
                    <p class="navbar-brand">BPBD | JABAR</p>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @if ($akun->is_admin === 1)
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">Admin</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="left-content">
                    <div class="content d-flex flex-column justify-content-center vh-100">
                        <h3>Indeks Kesiapsiagaan Masyarakat</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi adipisci quod, labore facere error autem, quidem cupiditate inventore doloribus ea, dolor porro aliquid neque blanditiis possimus eaque mollitia explicabo iusto?</p>
                        <div class="d-flex flex-row justify-content-around">
                            <a href="{{ route('user.survei',1) }}" class="btn-survey">Lakukan Survey</a> <a href="{{ route('user.lihat-survei') }}" class="btn-detail">Lihat Survey</a>
                        </div>
                    </div>
                </div>
                <div class="right-content mt-5">
                    <img src="{{ asset('image/image_dashboard_user.jpg') }}" alt="survey logo" class="logo">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
