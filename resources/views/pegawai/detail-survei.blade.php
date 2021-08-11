<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai | Detail Survei</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <style>
        th{
            vertical-align: middle;
            text-align: center;
        }

        a, a:hover{
            text-decoration: none;
            color: black;
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
        <table class="table table-sm table-bordered">
            <thead>
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
                    //Nilai C
                    $nilai_c1 = ($param_3[0]->c1_1 + $param_3[0]->c1_2)/2;
                    $nilai_c2 = ($param_3[0]->c2_1 + $param_3[0]->c2_2)/2;
                    $nilai_c3 = ($param_3[0]->c3_1 + $param_3[0]->c3_2)/2;
                    $nilai_indeks_c = ($nilai_c1 * 0.40) + ($nilai_c2 * 0.35) + ($nilai_c3 * 0.25);

                    //Nilai D
                    $nilai_d1 = ($param_4[0]->d1_1 + $param_4[0]->d1_2)/2;
                    $nilai_d2 = ($param_4[0]->d2_1 + $param_4[0]->d2_2)/2;
                    $nilai_d3 = ($param_4[0]->d3_1 + $param_4[0]->d3_2)/2;
                    $nilai_d4 = ($param_4[0]->d4_1 + $param_4[0]->d4_2)/2;
                    $nilai_indeks_d = ($nilai_d1 * 0.25) + ($nilai_d2 * 0.25) + ($nilai_d3 * 0.25) * ($nilai_d4 * 0.25);

                    //Nilai E
                    $nilai_e1 = ($param_5[0]->e1_1 + $param_5[0]->e1_2)/2;
                    $nilai_e2 = ($param_5[0]->e2_1 + $param_5[0]->e2_2)/2;
                    $nilai_indeks_e = ($nilai_e1 * 0.65) + ($nilai_e2 * 0.35);
                @endphp
                @for ($i=1; $i<=12; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $bencana[$i-1]->nama_bencana }}</td>
                        @php
                            //Nilai A
                            $nilai_a1 = ($param_1_2[$i]['param_1'][0]->a1_1 + $param_1_2[$i]['param_1'][0]->a1_2)/2;
                            $nilai_a2 = ($param_1_2[$i]['param_1'][0]->a2_1 + $param_1_2[$i]['param_1'][0]->a2_2)/2;
                            $nilai_a3 = ($param_1_2[$i]['param_1'][0]->a3_1 + $param_1_2[$i]['param_1'][0]->a3_2)/2;
                            $nilai_a4 = ($param_1_2[$i]['param_1'][0]->a4_1 + $param_1_2[$i]['param_1'][0]->a4_2)/2;
                            $nilai_a5 = ($param_1_2[$i]['param_1'][0]->a5_1 + $param_1_2[$i]['param_1'][0]->a5_2)/2;
                            $nilai_indeks_a = ($nilai_a1 * 0.10) + ($nilai_a2 * 0.15) + ($nilai_a3 * 0.25) + ($nilai_a4 * 0.20) + ($nilai_a5 * 0.30);

                            //Nilai B
                            $nilai_b1 = ($param_1_2[$i]['param_2'][0]->b1_1 + $param_1_2[$i]['param_2'][0]->b1_2)/2;
                            $nilai_b2 = ($param_1_2[$i]['param_2'][0]->b2_1 + $param_1_2[$i]['param_2'][0]->b2_2)/2;
                            $nilai_b3 = ($param_1_2[$i]['param_2'][0]->b3_1 + $param_1_2[$i]['param_2'][0]->b3_2)/2;
                            $nilai_b4 = ($param_1_2[$i]['param_2'][0]->b4_1 + $param_1_2[$i]['param_2'][0]->b4_2)/2;
                            $nilai_indeks_b = ($nilai_b1 * 0.35) + ($nilai_b2 * 0.30) + ($nilai_b3 * 0.20) + ($nilai_b4 * 0.15);

                            $nilai_indeks_kapasitas = ($nilai_indeks_a + $nilai_indeks_b + $nilai_indeks_c + $nilai_indeks_d + $nilai_indeks_e)/5;
                        @endphp
                        <td>{{ $nilai_a1 }}</td>
                        <td>{{ $nilai_a2 }}</td>
                        <td>{{ $nilai_a3 }}</td>
                        <td>{{ $nilai_a4 }}</td>
                        <td>{{ $nilai_a5 }}</td>
                        <td>{{ $nilai_indeks_a }}</td>

                        <td>{{ $nilai_b1 }}</td>
                        <td>{{ $nilai_b2 }}</td>
                        <td>{{ $nilai_b3 }}</td>
                        <td>{{ $nilai_b4 }}</td>
                        <td>{{ $nilai_indeks_b }}</td>

                        <td>{{ $nilai_c1 }}</td>
                        <td>{{ $nilai_c2 }}</td>
                        <td>{{ $nilai_c3 }}</td>
                        <td>{{ $nilai_indeks_c }}</td>

                        <td>{{ $nilai_d1 }}</td>
                        <td>{{ $nilai_d2 }}</td>
                        <td>{{ $nilai_d3 }}</td>
                        <td>{{ $nilai_d4 }}</td>
                        <td>{{ $nilai_indeks_d }}</td>

                        <td>{{ $nilai_e1 }}</td>
                        <td>{{ $nilai_e2 }}</td>
                        <td>{{ $nilai_indeks_e }}</td>

                        <td>{{ $nilai_indeks_kapasitas }}</td>
                        <td>{{ $nilai_indeks_kapasitas >= 0.67 && $nilai_indeks_kapasitas <= 1 ? "Tinggi" : ($nilai_indeks_kapasitas >= 0.33 && $nilai_indeks_kapasitas < 0.67 ? "Sedang" : "Rendah") }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>
</html>
