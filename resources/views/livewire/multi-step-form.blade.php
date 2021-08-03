<div>

    @php
        $bencana = array(
            1 => "Gempa Bumi",
            2 => "Tsunami"
        );
        $i = 1;
    @endphp

    <form action="" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        {{-- Step 1 : Pengisian Identitas --}}

        <div class="card">
            <div class="card-header bg-secondary text-white">Langkah {{ $i }}/16 - Pengisian Identitas</div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nama Responden</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Usia</label>
                            <input type="number" name="nama" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" value="Pria">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" value="Wanita">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Kabupaten/Kota</label>
                            <select name="kota" id="kota" class="form-control" wire:model="selectedKota">
                                @foreach ($kotas as $d)
                                    <option value="{{ $d->kode }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control" wire:model="selectedKecamatan">
                                <option selected="true" value="" disabled>Pilih Kecamatan</option>
                                @if(!is_null($kecamatans))

                                    @foreach ($kecamatans as $k)
                                        <option value="{{ $k->kode }}">{{ $k->nama }}</option>
                                    @endforeach

                                @endif

                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Desa</label>
                            <select name="desa" id="desa" class="form-control input-lg">
                                <option selected="true" value="" disabled>Pilih Desa</option>
                                @if (!is_null($kelurahans))
                                    @foreach ($kelurahans as $desa)
                                        <option value="{{ $desa->kode }}">{{ $desa->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                @foreach ($log as $l)
                    <h1>{{ $l }}</h1>
                @endforeach

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Surveyor</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ $akun->nama_pegawai }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Survey</label>
                            <input type="text" name="jabatan" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($bencana as $key => $value)

        @endforeach

    </form>
</div>
