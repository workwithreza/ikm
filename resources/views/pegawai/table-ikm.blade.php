<table class="table table-sm table-bordered mb-5">

    <thead>
        <tr class="borderless">
            <td colspan="2">Nama Responden</td>
            <td colspan="6">: {{ $responden->nama_responden }}</td>
            <td colspan="12"></td>
            <td colspan="4">Nama Surveyor</td>
            <td colspan="6">: {{ $pegawai->nama_pegawai }}</td>
        </tr>
        <tr class="borderless">
            <td colspan="2">Jabatan</td>
            <td colspan="6">: {{ $responden->jabatan_responden }}</td>
            <td colspan="12"></td>
            <td colspan="4">Tanggal Survey</td>
            <td colspan="6">: {{ $pegawai->tanggal_survey }}</td>
        </tr>
        <tr class="borderless">
            <td colspan="2">Usia</td>
            <td colspan="6">: {{ $responden->usia_responden }} Tahun</td>
        </tr>
        <tr class="borderless">
            <td colspan="2">Jenis Kelamin</td>
            <td colspan="6">: {{ $responden->jenis_kelamin }}</td>
        </tr>
        <tr class="borderless">
            <td colspan="2">Provinsi</td>
            <td colspan="6">: {{ $wilayah['provinsi']->nama }}</td>
        </tr>
        <tr class="borderless">
            <td colspan="2">Kabupaten/Kota</td>
            <td colspan="6">: {{ $wilayah['kota']->nama }}</td>
        </tr>
        <tr class="borderless">
            <td colspan="2">Kecamatan</td>
            <td colspan="6">: {{ $wilayah['kecamatan']->nama }}</td>
        </tr>
        <tr class="borderless">
            <td colspan="2">Desa</td>
            <td colspan="6">: {{ $responden->nama }}</td>
        </tr>
        <tr class="borderless">
            <td></td>
        </tr>
        <tr class="borderless">
            <td></td>
        </tr>
        <tr class="borderless">
            <td></td>
        </tr>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Bencana</th>
            <th colspan="5">A</th>
            <th rowspan="2">Indeks <br> A</th>
            <th colspan="4">B</th>
            <th rowspan="2">Indeks <br> B</th>
            <th colspan="3">C</th>
            <th rowspan="2">Indeks <br> C</th>
            <th colspan="4">D</th>
            <th rowspan="2">Indeks <br> D</th>
            <th colspan="2">E</th>
            <th rowspan="2">Indeks <br> E</th>
            <th rowspan="2">Indeks <br> Kapasitas</th>
            <th rowspan="2">Level <br> Kapasitas</th>
        </tr>
        <tr>
            <th>A1</th>
            <th>A2</th>
            <th>A3</th>
            <th>A4</th>
            <th>A5</th>

            <th>B1</th>
            <th>B2</th>
            <th>B3</th>
            <th>B4</th>

            <th>C1</th>
            <th>C2</th>
            <th>C3</th>

            <th>D1</th>
            <th>D2</th>
            <th>D3</th>
            <th>D4</th>

            <th>E1</th>
            <th>E2</th>
        </tr>
    </thead>
    <tbody>
        @php
            //Untuk Rata rata A
            $avg_a1 = 0;
            $avg_a2 = 0;
            $avg_a3 = 0;
            $avg_a4 = 0;
            $avg_a5 = 0;
            $avg_indeks_a = 0;

            //Untuk Rata rata B
            $avg_b1 = 0;
            $avg_b2 = 0;
            $avg_b3 = 0;
            $avg_b4 = 0;
            $avg_indeks_b = 0;

            //Untuk Rata rata C
            $avg_c1 = 0;
            $avg_c2 = 0;
            $avg_c3 = 0;
            $avg_indeks_c = 0;

            //Untuk Rata rata D
            $avg_d1 = 0;
            $avg_d2 = 0;
            $avg_d3 = 0;
            $avg_d4 = 0;
            $avg_indeks_d = 0;

            //Untuk Rata rata E
            $avg_e1 = 0;
            $avg_e2 = 0;
            $avg_indeks_e = 0;

            //Untuk Rata Rata Indeks Kapasitas
            $avg_indeks_kapasitas = 0;

            //Nilai C
            $nilai_c1 = ($param_3[0]->c1_1 + $param_3[0]->c1_2)/2;
            $nilai_c2 = ($param_3[0]->c2_1 + $param_3[0]->c2_2)/2;
            $nilai_c3 = ($param_3[0]->c3_1 + $param_3[0]->c3_2)/2;
            $nilai_indeks_c = ($nilai_c1 * 0.40) + ($nilai_c2 * 0.35) + ($nilai_c3 * 0.25);
            $avg_c1 = ($nilai_c1 * 12) / 12;
            $avg_c2 = ($nilai_c2 * 12) / 12;
            $avg_c3 = ($nilai_c3 * 12) / 12;
            $avg_indeks_c = ($nilai_indeks_c * 12) / 12;

            //Nilai D
            $nilai_d1 = ($param_4[0]->d1_1 + $param_4[0]->d1_2)/2;
            $nilai_d2 = ($param_4[0]->d2_1 + $param_4[0]->d2_2)/2;
            $nilai_d3 = ($param_4[0]->d3_1 + $param_4[0]->d3_2)/2;
            $nilai_d4 = ($param_4[0]->d4_1 + $param_4[0]->d4_2)/2;
            $nilai_indeks_d = ($nilai_d1 * 0.25) + ($nilai_d2 * 0.25) + ($nilai_d3 * 0.20) + ($nilai_d4 * 0.30);
            $avg_d1 = ($nilai_d1 * 12) / 12;
            $avg_d2 = ($nilai_d2 * 12) / 12;
            $avg_d3 = ($nilai_d3 * 12) / 12;
            $avg_d4 = ($nilai_d4 * 12) / 12;
            $avg_indeks_d = ($nilai_indeks_d * 12) / 12;

            //Nilai E
            $nilai_e1 = ($param_5[0]->e1_1 + $param_5[0]->e1_2)/2;
            $nilai_e2 = ($param_5[0]->e2_1 + $param_5[0]->e2_2)/2;
            $nilai_indeks_e = ($nilai_e1 * 0.65) + ($nilai_e2 * 0.35);
            $avg_e1 = ($nilai_e1 * 12) / 12;
            $avg_e2 = ($nilai_e2 * 12) / 12;
            $avg_indeks_e = ($nilai_indeks_e * 12) / 12;
        @endphp
        @for ($i=1; $i<=12; $i++)
            <tr>
                <td class="text-center">{{ $i }}</td>
                <td>{{ $bencana[$i-1]->nama_bencana }}</td>
                @php
                    //Nilai A
                    $nilai_a1 = ($param_1_2[$i]['param_1'][0]->a1_1 + $param_1_2[$i]['param_1'][0]->a1_2)/2;
                    $nilai_a2 = ($param_1_2[$i]['param_1'][0]->a2_1 + $param_1_2[$i]['param_1'][0]->a2_2)/2;
                    $nilai_a3 = ($param_1_2[$i]['param_1'][0]->a3_1 + $param_1_2[$i]['param_1'][0]->a3_2)/2;
                    $nilai_a4 = ($param_1_2[$i]['param_1'][0]->a4_1 + $param_1_2[$i]['param_1'][0]->a4_2)/2;
                    $nilai_a5 = ($param_1_2[$i]['param_1'][0]->a5_1 + $param_1_2[$i]['param_1'][0]->a5_2)/2;
                    $nilai_indeks_a = ($nilai_a1 * 0.10) + ($nilai_a2 * 0.15) + ($nilai_a3 * 0.25) + ($nilai_a4 * 0.20) + ($nilai_a5 * 0.30);
                    $avg_a1 += $nilai_a1;
                    $avg_a2 += $nilai_a2;
                    $avg_a3 += $nilai_a3;
                    $avg_a4 += $nilai_a4;
                    $avg_a5 += $nilai_a5;
                    $avg_indeks_a += $nilai_indeks_a;

                    //Nilai B
                    $nilai_b1 = ($param_1_2[$i]['param_2'][0]->b1_1 + $param_1_2[$i]['param_2'][0]->b1_2)/2;
                    $nilai_b2 = ($param_1_2[$i]['param_2'][0]->b2_1 + $param_1_2[$i]['param_2'][0]->b2_2)/2;
                    $nilai_b3 = ($param_1_2[$i]['param_2'][0]->b3_1 + $param_1_2[$i]['param_2'][0]->b3_2)/2;
                    $nilai_b4 = ($param_1_2[$i]['param_2'][0]->b4_1 + $param_1_2[$i]['param_2'][0]->b4_2)/2;
                    $nilai_indeks_b = ($nilai_b1 * 0.35) + ($nilai_b2 * 0.30) + ($nilai_b3 * 0.20) + ($nilai_b4 * 0.15);

                    $avg_b1 += $nilai_b1;
                    $avg_b2 += $nilai_b2;
                    $avg_b3 += $nilai_b3;
                    $avg_b4 += $nilai_b4;
                    $avg_indeks_b += $nilai_indeks_b;

                    $nilai_indeks_kapasitas = ($nilai_indeks_a + $nilai_indeks_b + $nilai_indeks_c + $nilai_indeks_d + $nilai_indeks_e)/5;

                    $avg_indeks_kapasitas += $nilai_indeks_kapasitas;
                @endphp

                <td class="text-center">{{ $nilai_a1 }}</td>
                <td class="text-center">{{ $nilai_a2 }}</td>
                <td class="text-center">{{ $nilai_a3 }}</td>
                <td class="text-center">{{ $nilai_a4 }}</td>
                <td class="text-center">{{ $nilai_a5 }}</td>
                <td class="text-center"><b>{{ $nilai_indeks_a }}</b></td>

                <td class="text-center">{{ $nilai_b1 }}</td>
                <td class="text-center">{{ $nilai_b2 }}</td>
                <td class="text-center">{{ $nilai_b3 }}</td>
                <td class="text-center">{{ $nilai_b4 }}</td>
                <td class="text-center"><b>{{ $nilai_indeks_b }}</b></td>

                <td class="text-center">{{ $nilai_c1 }}</td>
                <td class="text-center">{{ $nilai_c2 }}</td>
                <td class="text-center">{{ $nilai_c3 }}</td>
                <td class="text-center"><b>{{ $nilai_indeks_c }}</b></td>

                <td class="text-center">{{ $nilai_d1 }}</td>
                <td class="text-center">{{ $nilai_d2 }}</td>
                <td class="text-center">{{ $nilai_d3 }}</td>
                <td class="text-center">{{ $nilai_d4 }}</td>
                <td class="text-center"><b>{{ $nilai_indeks_d }}</b></td>

                <td class="text-center">{{ $nilai_e1 }}</td>
                <td class="text-center">{{ $nilai_e2 }}</td>
                <td class="text-center"><b>{{ $nilai_indeks_e }}</b></td>

                <td class="text-center">{{ $nilai_indeks_kapasitas }}</td>
                <td class="text-center">{{ $nilai_indeks_kapasitas > 0.8 && $nilai_indeks_kapasitas <= 1 ? "Tinggi" : ($nilai_indeks_kapasitas > 0.4 && $nilai_indeks_kapasitas <= 0.8 ? "Sedang" : "Rendah") }}</td>
            </tr>
        @endfor
        <tr class="bg-dark text-light text-center">
            <td colspan="2"><b>Indeks Multi Bencana</b></td>
            <td><b>{{ round($avg_a1/12,2) }}</b></td>
            <td><b>{{ round($avg_a2/12,2) }}</b></td>
            <td><b>{{ round($avg_a3/12,2) }}</b></td>
            <td><b>{{ round($avg_a4/12,2) }}</b></td>
            <td><b>{{ round($avg_a5/12,2) }}</b></td>
            <td><b>{{ round($avg_indeks_a/12,2) }}</b></td>
            <td><b>{{ round($avg_b1/12,2) }}</b></td>
            <td><b>{{ round($avg_b2/12,2) }}</b></td>
            <td><b>{{ round($avg_b3/12,2) }}</b></td>
            <td><b>{{ round($avg_b4/12,2) }}</b></td>
            <td><b>{{ round($avg_indeks_b/12,2) }}</b></td>
            <td><b>{{ $avg_c1 }}</b></td>
            <td><b>{{ $avg_c2 }}</b></td>
            <td><b>{{ $avg_c3 }}</b></td>
            <td><b>{{ $avg_indeks_c }}</b></td>
            <td><b>{{ $avg_d1 }}</b></td>
            <td><b>{{ $avg_d2 }}</b></td>
            <td><b>{{ $avg_d3 }}</b></td>
            <td><b>{{ $avg_d4 }}</b></td>
            <td><b>{{ $avg_indeks_d }}</b></td>
            <td><b>{{ $avg_e1 }}</b></td>
            <td><b>{{ $avg_e2 }}</b></td>
            <td><b>{{ $avg_indeks_e }}</b></td>
            <td><b>{{ round($avg_indeks_kapasitas/12,2) }}</b></td>
            <td><b>{{ $avg_indeks_kapasitas/12 >= 0 && $avg_indeks_kapasitas/12 <= 0.4 ? "Rendah" : ($avg_indeks_kapasitas/12 > 0.4 && $avg_indeks_kapasitas/12 <= 0.8 ? "Sedang" : "Tinggi") }}</b></td>
        </tr>
    </tbody>
</table>
