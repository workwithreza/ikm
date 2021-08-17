<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai | Detail Survei</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <link rel="icon" href="{{ asset('image/BPBD.png') }}" type="image/icon type">
    <style>
        th{
            vertical-align: middle;
            text-align: center;
        }

        a, a:hover{
            text-decoration: none;
            color: black;
        }

        .borderless{
            border: none !important;
        }

        thead > tr > td{
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('user.lihat-survei') }}" class="d-flex mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            <p>Kembali</p>
        </a>
    </div>
    <div class="container">
        <div class="text-center p-5">
            <h1>Indeks Kesiapsiagaan Masyarakat</h1>
        </div>

        @include('pegawai.table-ikm',[$param_1_2, $param_3, $param_4, $param_5, $bencana, $responden, $pegawai, $wilayah])

        <div class="download-btn text-center">
            <a href="{{ route('user.download-ikm-excel',$responden->no_responden) }}" type="button" class="btn-success mb-5 p-3 rounded">Download Excel</a>
        </div>
    </div>
</body>
</html>
