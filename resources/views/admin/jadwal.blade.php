<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Jadwal Survei</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{ asset('image/BPBD.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('css/manajemen_akun.css') }}">
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="header-background">

    </div>
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

            <div class="content-wrapper" style="width: 100%">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="th-sm">Mulai</th>
                            <th class="th-sm">Selesai</th>
                            <th class="th-sm">Batch</th>
                            <th class="th-sm">Status</th>
                            <th class="th-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr class="text-center">
                                <td>{{ $item->mulai_survei }}</td>
                                <td>{{ $item->akhir_survei }}</td>
                                <td>{{ $item->batch }}</td>
                                @if ($item->status == 0)
                                    <td>Belum Dilakukan</td>
                                @endif
                                @if ($item->status == 1)
                                    <td>Sedang Dilakukan</td>
                                @endif
                                @if ($item->status == 2)
                                    <td>Sudah Dilakukan</td>
                                @endif
                                <td class="d-flex justify-content-around">
                                    <button class="btn btn-danger" id="btnHapus" onclick="alertHapus({{ $item->id }})" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="add">
                    <button type="button" class="btn btn-success p-2" data-toggle="modal" data-target="#modalfade">
                        Tambah Jadwal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="create-pegawai d-flex justify-content-center mb-3 mt-5">
            <div class="modal fade" id="modalfade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="100%">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Survei</h4>
                        </div>

                        <div class="modal-body">
                            @if (Session::get('berhasil'))
                                <div class="alert alert-success">
                                    {{ Session::get('berhasil') }}
                                </div>
                            @endif

                            @if (Session::get('gagal'))
                                <div class="alert alert-danger text-center">
                                    {!! Session::get('gagal') !!}
                                </div>
                            @endif
                            <form action="{{ route('admin.tambahJadwal') }}" method="post">
                                @csrf
                                <div class="form-group mt-2">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="mulai" min="{{ date("Y-m-d") }}">
                                    <span style="color:red;">@error('mulai')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="selesai" min="{{ date("Y-m-d") }}">
                                    <span style="color:red;">@error('selesai')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Nama Batch</label>
                                    <input type="text" class="form-control" name="batch">
                                    <span style="color:red;">@error('batch')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" value="Tambah" class="form-control btn btn-primary">
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="100%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Pegawai</h4>
                    </div>

                    <div class="modal-body text-center">
                        <h5>Yakin ingin menghapus data ini?</h5><br>
                        <form action="{{ route('admin.hapus_jadwal') }}" method="get">
                            @csrf
                            <input type="text" name="id" id="mulaiHapusInput" hidden>
                            <button type="submit" class="btn btn-danger" id="buttonHapus">Hapus</button>
                            <button type="button" class="btn btn-primary btnclose" onclick="batalAlert()">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @error('mulai')
        <script>
            $('#modalfade').modal('show');
        </script>
    @enderror
    @error('selesai')
        <script>
            $('#modalfade').modal('show');
        </script>
    @enderror
    @error('batch')
        <script>
            $('#modalfade').modal('show');
        </script>
    @enderror
    @if (Session::get('berhasil'))
    <script>
        $('#modalfade').modal('show');
    </script>
    @endif

    @if (Session::get('gagal'))
    <script>
        $('#modalfade').modal('show');
    </script>
    @endif

    @if (Session::get('hapus'))
        <script>
            alert("{{ Session::get('hapus') }}");
        </script>
    @endif

    <script src="{{ asset('Bootstrap/TableCSS/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            $('.btnclose').on('click',function(){
                $('#modalAlert').modal('hide');
            });
        });

        function alertHapus(id){
            $('#modalAlert').modal('show');
            document.getElementById('mulaiHapusInput').setAttribute("value",id);
        }
    </script>
</body>
</html>
