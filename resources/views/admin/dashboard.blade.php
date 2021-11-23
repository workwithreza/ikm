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
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="header-background"></div>
    <div class="container-custom">
        <div class="side-nav">
            <div class="side-box">
                <div class="side-header">
                    <a href="{{ route('admin.dashboard') }}" class="navbar-brand text-center"><p>BPBD | JABAR</p>
                        <center>
                            <img src="{{ asset('image/jabar.png') }}" style="margin-left:-25px;width:150px;height:100px;">
                            <img src="{{ asset('image/BPBD.png') }}" style="width:100px;height:100px;">
                        </center>
                    </a>
                    <p class="m-0 text-center">Selamat Datang!</p>
                    <h3 class="text-center">{{ $akun->nama_pegawai }}</h3>
                </div>

                <div class="side-body">
                    <ul>
                        <li><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
                        <li><a href="{{ route('admin.akun') }}">Manajemen Akun</a></li>
                        <li><a href="{{ route('admin.jadwal') }}">Jadwal Survei</a></li>
                    </ul>
                </div>

                <div class="side-footer">
                    <ul>
                        <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>

            <div class="content-wrapper" style="width: 100%;">
                <div class="box d-flex justify-content-center align-items-center" style="width: 100%;">
                    <div class="logo">
                        <img src="{{ asset('image/man-user.png') }}" alt="Pegawai" width="30">
                    </div>
                    <div class="content">
                        <div class="title">
                            Jumlah Pegawai
                        </div>
                        <div class="body">
                            {{ $jumlah_pegawai }}
                        </div>
                    </div>
                </div>

                <div class="box d-flex justify-content-center align-items-center">
                    <div class="logo">
                        <img src="{{ asset('image/list.png') }}" alt="Survey" width="30">
                    </div>
                    <div class="content">
                        <div class="title">
                            Total Survey
                        </div>
                        <div class="body">
                            {{ $total_survey }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
