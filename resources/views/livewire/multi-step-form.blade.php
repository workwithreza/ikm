<div>

    @php
        $bencana = array(
            1 => "Gempa Bumi",
            2 => "Tsunami",
            3 => "Banjir",
            4 => "Tanah Longsor",
            5 => "Letusan Gunung Api",
            6 => "Kekeringan",
            7 => "Gelombang Ekstrim dan Abrasi",
            8 => "Cuaca Ekstrim (Angin Puting Beliung)",
            9 => "Kebakaran Hutan dan Lahan",
            10 => "Epidemi dan Wabah Penyakit",
            11 => "Kegagalan Teknologi",
            12 => "Konflik Sosial"
        );
        $i = 1;
    @endphp

    <form action="" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        {{-- Step 1 : Pengisian Identitas --}}
        @if ($currentStep == 1)
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
                                <option selected value="" disabled>Pilih Kota/Kabupaten</option>
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
                            <input type="text" name="jabatan" class="form-control" value="{{ date("Y-m-d") }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @foreach ($bencana as $key => $value)
        @php
            $i++;
        @endphp
        @if ($currentStep == $i)

        <div class="card">
            <div class="card-header bg-secondary text-white">Langkah {{ $i }}/16 - {{ $value }}</div>
            <div class="card-body">

                {{-- Parameter 1 --}}

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a1-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah masyarakat mengetahui potensi bencana dan bencana turunannya yang ada di Desa/Kelurahan?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a1_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a1_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a1-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah masyarakat mengetahui tanda-tanda alam penyebab terjadi bencana di Desanya?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a1_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a1_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a2-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah masyarakat mengetahui tanda-tanda alam penyebab terjadi bencana di Desanya?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a2_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a2_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a2-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah masyarakat pernah mendapatkan sosialsasi tentang penyebab dan tanda- tanda terjadinya bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a2_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a2_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a3-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah masyarakat mengetahui dan mendapatkan sistem peringatan dini bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a3_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a3_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a3-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah ada sumber daya khusus (sarana, prasarana, personil) untuk penyebaran informasi peringatan dini bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a3_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a3_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a4-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah mesyarakat telah mengetahui dampak yang mungkin terjadi akibat bencana (korban jiwa/ kerugian ekonomi/ kerusakan bangunan)?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a4_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a4_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a4-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah masyarakat telah melakukan upaya-upaya untuk mengurangi kerentanan (dampak yang mungkin terjadi) akibat bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a4_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a4_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a5-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah telah ada Rencana Evakuasi Desa yang disusun dan disosialisasikan?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a5_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a5_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-a5-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah Rencana Evakuasi Desa tersebut telah diujicoba melalui pelaksanaan simulasi evakuasi Desa?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a5_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_1_a5_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Parameter 2 --}}

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b1-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah telah tersedia jalur evakuasi yang dilengkapi dengan rambu-rambu evakuasi serta lokasi yang dapat  digunakan sebagai tempat evakuasi jika terjadi bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b1_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b1_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b1-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah tempat evakuasi tersebut sudah dikelola sehingga dapat dimanfaatkan untuk kegiatan masyarakat dan kepentingan umum sebelum maupun pada saat terjadi bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b1_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b1_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b2-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah telah tersedia lokasi yang dapat  digunakan sebagai tempat pengungsian jika terjadi bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b2_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b2_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b2-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah tempat pengungsian tersebut sudah dikelola sehingga dapat dimanfaatkan untuk kegiatan masyarakat dan kepentingan umum sebelum maupun pada saat terjadi bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b2_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b2_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b3-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah telah terdapat sumber air bersih, sarana sanitasi (MCK) yang dapat digunakan pada saat pengungsian?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b3_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b3_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b3-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah sumber air bersih, sarana sanitasi (MCK) tersebut telah dikelola sehingga dapat dimanfaatkan untuk kegiatan masyarakat dan kepentingan umum sebelum maupun pada saat terjadi bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b3_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b3_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b4-1-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah telah tersedia tenaga kesehatan di desa yang dapat membantu pada saat tanggap darurat bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b4_1_{{ $key }}" data-ask="{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b4_1_{{ $key }}" data-ask="{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-b4-2-{{ $key }}">
                    <div class="title p-1">
                        <p>Apakah tenaga kesehatan tersebut sudah dilengkapi dengan fasilitas standar kesehatan untuk mendukung proses penyelamatan korban pada saat tanggap darurat bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b4_2_{{ $key }}" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_2_b4_2_{{ $key }}" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif
        @endforeach

        {{-- Parameter 3 --}}
        @php
            $i += 1;
        @endphp
        @if ($currentStep == $i)
        <div class="card">

            <div class="card-header bg-secondary text-white">Langkah {{ $i }}/16 - Pengaruh Kerentanan Masyarakat Terhadap Upaya Pengurangan Risiko Bencana</div>
            <div class="card-body">
                <div class="pertanyaan m-3 mb-5" id="pertanyaan-c1-1">
                    <div class="title p-1">
                        <p>Apakah jenis mata pencaharian dan tingkat penghasilan masyarakat mampu menjaga keberlangsungan perekonomiannya pada saat maupun pasca bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c1_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c1_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-c1-2">
                    <div class="title p-1">
                        <p>Apakah masyarakat mampu secara mandiri untuk menjaga keberlangsungan perekonomiannya pada saat maupun pasca bencana tersebut (tidak membutuhkan program-program bantuan sosial atau sejenisnya)?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c1_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c1_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-c2-1">
                    <div class="title p-1">
                        <p>Apakah sebagian besar masyarakat telah lulus pendidikan Sekolah Menengah Atas (SMA atau sederajat)?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c2_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c2_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-c2-2">
                    <div class="title p-1">
                        <p>Apakah sebagian besar masyarakat sedang atau telah lulus jenjang pendidikan Perguruan Tinggi?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c2_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c2_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-c3-1">
                    <div class="title p-1">
                        <p>Apakah proses pengembangan pemukiman di wilayah  ini sudah memperhatikan acuan tata ruang?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c3_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c3_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-c3-2">
                    <div class="title p-1">
                        <p>Apakah proses pengembangan pemukiman di wilayah  ini sudah memperhatikan aspek pengurangan risiko bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c3_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_3_c3_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif

        {{-- Parameter 4 --}}
            @php
                $i += 1;
            @endphp

        @if ($currentStep == $i)

        <div class="card">
            <div class="card-header bg-secondary text-white">Langkah {{ $i }}/16 - Ketidak Tergantungan Masyarakat Terhadap Dukungan Pemerintah</div>
            <div class="card-body">
                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d1-1">
                    <div class="title p-1">
                        <p>Jika terjadi bencana, apakah masyarakat mampu menyiapkan kebutuhan pangan secara mandiri?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d1_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d1_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d1-2">
                    <div class="title p-1">
                        <p>Apakah penyiapan kebutuhan pangan oleh masyarakat dapat memenuhi kehidupan sampai selesainya masa tanggap darurat bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d1_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d1_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d2-1">
                    <div class="title p-1">
                        <p>Jika terjadi bencana, apakah masyarakat mampu melakukan perbaikan secara mandiri untuk tingkat kerusakan ringan pada bangunan dan lahan?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d2_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d2_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d2-2">
                    <div class="title p-1">
                        <p>Jika terjadi bencana, apakah masyarakat mampu melakukan perbaikan secara mandiri untuk tingkat kerusakan sedang/berat pada bangunan dan lahan?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d2_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d2_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d3-1">
                    <div class="title p-1">
                        <p>Apakah masyarakat di wilayah ini telah memulai penerapan hasil-hasil penelitian terkait dengan pengurangan risiko bencana (seperti: penerapan struktur bangunan tahan gempa, penerapan terasering, ataupun penanaman hutan mangrove)?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d3_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d3_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d3-2">
                    <div class="title p-1">
                        <p>Apakah penerapan hasil-hasil penelitian terkait dengan pengurangan risiko bencana (seperti: penerapan struktur bangunan tahan gempa, penerapan terasering, ataupun penanaman hutan mangrove) tersebut dilakukan secara mandiri/ swadaya masyarakat?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d3_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d3_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d4-1">
                    <div class="title p-1">
                        <p>Jika terjadi bencana di wilayah ini, apakah masyarakat bisa terlibat secara aktif untuk membantu pemerintah dalam pelaksanaan operasi tanggap darurat?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d4_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d4_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-d4-2">
                    <div class="title p-1">
                        <p>Apakah keterlibatan masyarakat dilakukan berdasarkan prosedur tetap penanganan darurat bencana (SOP) tingkat Desa/Kelurahan yang tersinkronisasi dengan SOP tingkat Kabupaten/Kota</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d4_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_4_d4_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif

        {{-- Parameter 5 --}}
            @php
                $i += 1;
            @endphp

        @if ($currentStep == $i)

        <div class="card">
            <div class="card-header bg-secondary text-white">Langkah {{ $i }}/16 - Bentuk Partisipasi Masyarakat</div>
            <div class="card-body">
                <div class="pertanyaan m-3 mb-5" id="pertanyaan-e1-1">
                    <div class="title p-1">
                        <p>Apakah di tingkat kelurahan/desa sudah memiliki rencana kesiapsiagaan/kontinjensi yang disusun secara partisipatif oleh masyarakat?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e1_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e1_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-e1-2">
                    <div class="title p-1">
                        <p>Apakah rencana kesiapsiagaan/kontinjensi tersebut telah disahkan dalam bentuk Peraturan Desa atau aturan setingkat Desa yang lainnya?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e1_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e1_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-e2-1">
                    <div class="title p-1">
                        <p>Apakah terdapat kelompok/organisasi relawan desa untuk pengurangan risiko bencana?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e2_1" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e2_1" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pertanyaan m-3 mb-5" id="pertanyaan-e2-2">
                    <div class="title p-1">
                        <p>Apakah kelompok/organisasi relawan tersebut mampu melaksanakan upaya-upaya pengurangan risiko bencana secara mandiri?</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e2_2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="param_5_e2_2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif

        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
            @if($currentStep == 1)
                <div></div>
            @endif

            @if($currentStep >= 2 && $currentStep <= 16)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Sebelumnya</button>
            @endif

            @if($currentStep >= 1 && $currentStep < 16)
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Selanjutnya</button>
            @endif

            @if($currentStep == 16)
                <button type="button" class="btn btn-md btn-primary">Submit</button>
            @endif
        </div>

    </form>
</div>

<script>
    @if ($currentStep > 1 && $currentStep < 14)
        document.getElementById("pertanyaan-a1-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-a2-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-a3-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-a4-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-a5-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-b1-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-b2-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-b3-2-"+{{ $currentStep - 1 }}).style.display = "none";
        document.getElementById("pertanyaan-b4-2-"+{{ $currentStep - 1 }}).style.display = "none";
    @endif



    @if ($currentStep == 14)
        document.getElementById("pertanyaan-c1-2").style.display = "none";
        document.getElementById("pertanyaan-c2-2").style.display = "none";
        document.getElementById("pertanyaan-c3-2").style.display = "none";
    @endif

    @if ($currentStep == 15)
        document.getElementById("pertanyaan-d1-2").style.display = "none";
        document.getElementById("pertanyaan-d2-2").style.display = "none";
        document.getElementById("pertanyaan-d3-2").style.display = "none";
        document.getElementById("pertanyaan-d4-2").style.display = "none";
    @endif

    @if ($currentStep == 16)
        document.getElementById("pertanyaan-e1-2").style.display = "none";
        document.getElementById("pertanyaan-e2-2").style.display = "none";
    @endif

    $(document).ready(function(){
        $('input[type=radio]').click(function(){
            var id = $(this).data("ask");

            if(this.name == "param_1_a1_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-a1-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-a1-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_1_a2_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-a2-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-a2-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_1_a3_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-a3-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-a3-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_1_a4_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-a4-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-a4-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_1_a5_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-a5-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-a5-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_2_b1_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-b1-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-b1-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_2_b2_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-b2-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-b2-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_2_b3_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-b3-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-b3-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_2_b4_1_"+id){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-b4-2-'+id).style.display = "block";
                }else{
                    document.getElementById('pertanyaan-b4-2-'+id).style.display = "none";
                }
            }else if(this.name == "param_3_c1_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-c1-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-c1-2').style.display = "none";
                }
            }else if(this.name == "param_3_c2_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-c2-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-c2-2').style.display = "none";
                }
            }else if(this.name == "param_3_c3_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-c3-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-c3-2').style.display = "none";
                }
            }else if(this.name == "param_4_d1_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-d1-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-d1-2').style.display = "none";
                }
            }else if(this.name == "param_4_d2_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-d2-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-d2-2').style.display = "none";
                }
            }else if(this.name == "param_4_d3_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-d3-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-d3-2').style.display = "none";
                }
            }else if(this.name == "param_4_d4_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-d4-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-d4-2').style.display = "none";
                }
            }else if(this.name == "param_5_e1_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-e1-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-e1-2').style.display = "none";
                }
            }else if(this.name == "param_5_e2_1"){
                if($(this).val() == 1){
                    document.getElementById('pertanyaan-e2-2').style.display = "block";
                }else{
                    document.getElementById('pertanyaan-e2-2').style.display = "none";
                }
            }
        });
    });
</script>
