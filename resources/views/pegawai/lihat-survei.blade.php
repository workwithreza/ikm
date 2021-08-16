<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai | Daftar Survey</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard_user.css') }}">
    <link rel="icon" href="{{ asset('image/BPBD.png') }}" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navigation">
                <a href="{{ route('user.dashboard') }}" class="d-flex" style="margin-bottom: -20px;">
                    <img src="{{ asset('image/jabar.png') }}" width="60" height="40">
                    <img src="{{ asset('image/BPBD.png') }}" style="margin-right: 20px;" width="40" height="40">
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

    @if (session('sukses'))
    <div class="container">
        <div class="alert alert-success text-center">
            {{ session('sukses') }}
        </div>
    </div>
    @endif

    <div class="container mt-3">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>Nomor</th>
                    <th>Nama Responden</th>
                    <th>Wilayah</th>
                    <th>Tanggal Survey</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($list as $l)
                    @php
                        $i += 1;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>{{ $l->nama_responden }}</td>
                        <td class="text-center">{{ $l->nama }}</td>
                        <td class="text-center">{{ $l->tanggal_survey }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('user.detail-survei',$l->no_responden) }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6.5c3.79 0 7.17 2.13 8.82 5.5-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12C4.83 8.63 8.21 6.5 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 5c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5 4.5-2.02 4.5-4.5-2.02-4.5-4.5-4.5z"/></svg>
                                </a>
                                <a href="{{ route('user.hapus-survei',$l->no_responden) }}" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>
