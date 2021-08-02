<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <link rel="icon" href="{{ asset('image/BPBD.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('css/dashboard_admin.css') }}">
</head>
<body>
    <div class="header-background">

    </div>
    <div class="container-custom">
        <div class="side-nav">
            <div class="side-box">
                <div class="side-header">
                    <a href="{{ route('admin.dashboard') }}" class="navbar-brand text-center"><p>BPBD | JABAR</p></a>
                    <p class="m-0 text-center">Selamat Datang!</p>
                    <h3 class="text-center">{{ $akun->nama_pegawai }}</h3>
                </div>

                <div class="side-body">
                    <ul>
                        <li><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
                        <li><a href="{{ route('admin.akun') }}">Manajemen Akun</a></li>
                        <li><a href="{{ route('user.dashboard') }}">Survey</a></li>
                    </ul>
                </div>

                <div class="side-footer">
                    <ul>
                        <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>

            <div class="content-wrapper">
                <h1>test</h1>
            </div>
        </div>
    </div>
</body>
</html>
