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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navigation">
                <a href="dashboard" class="d-flex" style="margin-bottom: -20px;">
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

    <div class="content-wrapper mt-3">
        <div class="container">
            <div class="content">
                <div class="header-content pt-4">
                    <h1>Selamat Datang, {{ $akun->nama_pegawai }}!</h1>
                </div>
                <div class="body-content mt-3">
                    <h5>Mulai lakukan <a href="{{ route('user.survei',1) }}" class="btn-custom">survey</a></h5>
                </div>
                <div class="footer-content">
                    <img src="{{ asset('image/image_dashboard_user.jpg') }}" alt="survey logo" class="logo">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
