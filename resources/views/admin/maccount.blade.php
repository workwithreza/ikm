<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Manajemen Akun</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{ asset('image/BPBD.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('css/manajemen_akun.css') }}">
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
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th-sm">NIP</th>
                            <th class="th-sm">Nama</th>
                            <th class="th-sm">Username</th>
                            <th class="th-sm">Password</th>
                            <th class="th-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->NIP }}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->username_pegawai }}</td>
                                <td>{{ $item->password_pegawai }}</td>
                                <td class="d-flex justify-content-between">
                                    <button class="btn btn-primary btnedit" data-toggle="modal" data-target="#modaledit"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg></button>
                                    <!--<a href="hapus/{{ $item->NIP }}" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg></a>-->
                                    <button class="btn btn-danger" id="btnHapus" onclick="alertHapus({{ $item->NIP }}, '{{ $item->nama_pegawai }}')" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="add">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalfade">
                        Tambah Data Pegawai
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
                            <h4 class="modal-title" id="myModalLabel">Tambah Data Pegawai</h4>
                        </div>

                        <div class="modal-body">
                            @if (Session::get('berhasil'))
                                <div class="alert alert-success">
                                    {{ Session::get('berhasil') }}
                                </div>
                            @endif

                            @if (Session::get('gagal'))
                                <div class="alert alert-danger">
                                    {{ Session::get('gagal') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.tambah') }}" method="post">
                                @csrf
                                <div class="form-group mt-2">
                                    <label>NIP</label>
                                    <input type="text" class="form-control" name="nip">
                                    <span style="color:red;">@error('nip')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama">
                                    <span style="color:red;">@error('nama')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username">
                                    <span style="color:red;">@error('username')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <span style="color:red;">@error('password')
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

        <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="100%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Data Pegawai</h4>
                    </div>

                    <div class="modal-body">
                        @if (Session::get('berhasil'))
                            <div class="alert alert-success">
                                {{ Session::get('berhasil') }}
                            </div>
                        @endif

                        @if (Session::get('gagal'))
                            <div class="alert alert-danger">
                                {{ Session::get('gagal') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.edit') }}" method="post">
                            @csrf
                            <div class="form-group mt-2">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nipedit" id="nip" value="{{ old('nipedit') }}" readonly>
                                <span style="color:red;">@error('nipedit')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                            <div class="form-group mt-2">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="namaedit" id="nama" value="{{ old('namaedit') }}">
                                <span style="color:red;">@error('namaedit')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                            <div class="form-group mt-2">
                                <label>Username</label>
                                <input type="text" class="form-control" name="usernameedit" id="username" value="{{ old('usernameedit') }}">
                                <span style="color:red;">@error('usernameedit')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                            <div class="form-group mt-2">
                                <label>Password</label>
                                <input type="text" class="form-control" name="passwordedit" id="password">
                                <span style="color:red;">@error('passwordedit')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                            <div class="form-group mt-3">
                                <input type="submit" value="Update" class="form-control btn btn-primary">
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btnclose" data-dismiss="modal">Batal</button>
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
                        <h6>Nama <span id="namaHapus"></span> NIP <span id="nipHapus"></span></h6>
                        <form action="{{ route('admin.hapus_pegawai') }}" method="get">
                            @csrf
                            <input type="text" name="nip" id="nipHapusInput" hidden>
                            <button type="submit" class="btn btn-danger" id="buttonHapus">Hapus</button>
                            <button type="button" class="btn btn-primary btnclose" onclick="batalAlert()">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @error('nip')
        <script>
            $('#modalfade').modal('show');
        </script>
    @enderror
    @error('nama')
        <script>
            $('#modalfade').modal('show');
        </script>
    @enderror
    @error('user')
        <script>
            $('#modalfade').modal('show');
        </script>
    @enderror
    @error('password')
        <script>
            $('#modalfade').modal('show');
        </script>
    @enderror

    @error('nipedit')
        <script>
            $('#modaledit').modal('show');
        </script>
    @enderror

    @error('namaedit')
        <script>
            $('#modaledit').modal('show');
        </script>
    @enderror

    @error('usernameedit')
        <script>
            $('#modaledit').modal('show');
        </script>
    @enderror

    @error('passwordedit')
        <script>
            $('#modaledit').modal('show');
        </script>
    @enderror

    @if (Session::get('berhasil') || Session::get('gagal'))
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

            $('.btnedit').on('click',function(){
                $('#modaledit').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text();
                });

                $('#nip').val(data[0]);
                $('#nama').val(data[1]);
                $('#username').val(data[2]);
            });

            $('.btnclose').on('click',function(){
                $('#modaledit').modal('hide');
            });
        });

        function alertHapus(nip, nama){
            $('#modalAlert').modal('show');
            document.getElementById('nipHapusInput').setAttribute("value",nip);
            document.getElementById('nipHapus').innerHTML = nip;
            document.getElementById('namaHapus').innerHTML = nama;
        }

        function batalAlert(){
            $('#modalAlert').modal('hide');
        }
    </script>
</body>
</html>
