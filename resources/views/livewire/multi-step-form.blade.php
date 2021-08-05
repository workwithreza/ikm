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
                            <input type="text" name="jabatan" class="form-control" value="{{ date("Y-m-d") }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($bencana as $key => $value)
            <div class="card">
                @php
                    $i++;
                @endphp
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
        @endforeach

        {{-- Parameter 3 --}}


    </form>
</div>

<script>
    for(var i=1; i<=12; i++){
        document.getElementById("pertanyaan-a1-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-a2-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-a3-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-a4-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-a5-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-b1-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-b2-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-b3-2-"+i).style.display = "none";
        document.getElementById("pertanyaan-b4-2-"+i).style.display = "none";
    }

    $(document).ready(function(){
        $('input[type=radio]').click(function(){
            console.log(this.name);
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
            }
        });
    });
</script>
