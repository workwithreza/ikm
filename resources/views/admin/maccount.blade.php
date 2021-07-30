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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard">BPBD | JABAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.akun') }}">Manajemen Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="create-pegawai d-flex justify-content-center mb-3 mt-5">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalfade">
                Tambah Data Pegawai
            </button>

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
                        <td class="d-flex justify-content-around">
                            <button class="btn btn-primary btnedit" data-toggle="modal" data-target="#modaledit">Edit</button>
                            <a href="hapus/{{ $item->NIP }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
    </script>
</body>
</html>
