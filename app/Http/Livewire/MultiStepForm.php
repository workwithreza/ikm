<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MultiStepForm extends Component{
    //Step 1
    public $nama_responden;
    public $usia;
    public $jabatan;
    public $gender;
    public $provincis;
    public $kotas;
    public $kecamatans;
    public $kelurahans;
    public $surveyor;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedDesa = null;

    //Step 2
    public $gempa_bumi;
    public $tsunami;
    public $banjir;
    public $tanah_longsor;
    public $gunung_meletus;
    public $kekeringan;
    public $abrasi;
    public $cuaca_ekstrim;
    public $kebakaran_hutan;
    public $epidemi;
    public $kegagalan_teknologi;
    public $konflik_sosial;

    //Step 3 to 14
    public $a1_1;
    public $a1_2;
    public $a2_1;
    public $a2_2;
    public $a3_1;
    public $a3_2;
    public $a4_1;
    public $a4_2;
    public $a5_1;
    public $a5_2;

    public $b1_1;
    public $b1_2;
    public $b2_1;
    public $b2_2;
    public $b3_1;
    public $b3_2;
    public $b4_1;
    public $b4_2;

    //Step 15
    public $c1_1;
    public $c1_2;
    public $c2_1;
    public $c2_2;
    public $c3_1;
    public $c3_2;

    //Step 16 Variables
    public $d1_1;
    public $d1_2;
    public $d2_1;
    public $d2_2;
    public $d3_1;
    public $d3_2;
    public $d4_1;
    public $d4_2;

    //Step 17 Variables
    public $e1_1;
    public $e1_2;
    public $e2_1;
    public $e2_2;

    //Global Variables
    public $currentStep = 1;
    public $lastStep = 16;

    public function mount($step){
        if($step > 1){
            if($step == 2){
                if(!session()->has('Step1')){
                    return redirect()->route('user.survei',1);
                }
            }else if($step > 2 && $step < 15){
                if(!session()->has('Step2')){
                    return redirect()->route('user.survei',$this->currentStep);
                }else{
                    if(session('Step2')[strval($step)] != null){
                        $this->currentStep = $step;
                    }else{
                        return redirect()->route('user.survei',$this->currentStep);
                    }
                }
            }else if($step == 15){
                for($i=14; $i>2; $i--){
                    $ketemu = false;
                    if(session()->has('Step'.strval($i))){
                        $ketemu = true;
                        break;
                    }
                }
                if(!$ketemu){
                    return redirect()->route('user.survei',2);
                }
            }else if($step == 16){
                if(!session()->has('Step15')){
                    return redirect()->route('user.survei',15);
                }
            }else if($step == 17){
                if(!session()->has('Step16')){
                    return redirect()->route('user.survei',15);
                }
            }else{
                return redirect()->route('user.survei',1);
            }
        }else if($step < 1){
            return redirect()->route('user.survei',1);
        }
        if($step == 1){
            if(session()->has('Step1')){
                $this->nama_responden = session('Step1')['nama_responden'];
                $this->jabatan = session('Step1')['jabatan'];
                $this->usia = session('Step1')['usia'];
                $this->gender = session('Step1')['gender'];

                $this->selectedProvinsi = session('Step1')['provinsi'];
                $this->selectedKota = session('Step1')['kota'];
                $this->selectedKecamatan = session('Step1')['kecamatan'];
                $this->selectedDesa = session('Step1')['desa'];

                //$this->surveyor = session('Step1')['surveyor'];
                //$this->tanggal = session('Step1')['tanggal'];
            }
        }else if($step == 2 && session()->has('Step2')){
            $this->gempa_bumi = session('Step2')['3'];
            $this->tsunami = session('Step2')['4'];
            $this->banjir = session('Step2')['5'];
            $this->tanah_longsor = session('Step2')['6'];
            $this->gunung_meletus = session('Step2')['7'];
            $this->kekeringan = session('Step2')['8'];
            $this->abrasi = session('Step2')['9'];
            $this->cuaca_ekstrim = session('Step2')['10'];
            $this->kebakaran_hutan = session('Step2')['11'];
            $this->epidemi = session('Step2')['12'];
            $this->kegagalan_teknologi = session('Step2')['13'];
            $this->konflik_sosial = session('Step2')['14'];
        }else if($step > 2 && $step < 15){
            if(session()->has('Step'.$step)){
                $this->a1_1 = session('Step'.$step)['a1_1'];
                $this->a1_2 = session('Step'.$step)['a1_2'];
                $this->a2_1 = session('Step'.$step)['a2_1'];
                $this->a2_2 = session('Step'.$step)['a2_2'];
                $this->a3_1 = session('Step'.$step)['a3_1'];
                $this->a3_2 = session('Step'.$step)['a3_2'];
                $this->a4_1 = session('Step'.$step)['a4_1'];
                $this->a4_2 = session('Step'.$step)['a4_2'];
                $this->a5_1 = session('Step'.$step)['a5_1'];
                $this->a5_2 = session('Step'.$step)['a5_2'];

                $this->b1_1 = session('Step'.$step)['b1_1'];
                $this->b1_2 = session('Step'.$step)['b1_2'];
                $this->b2_1 = session('Step'.$step)['b2_1'];
                $this->b2_2 = session('Step'.$step)['b2_2'];
                $this->b3_1 = session('Step'.$step)['b3_1'];
                $this->b3_2 = session('Step'.$step)['b3_2'];
                $this->b4_1 = session('Step'.$step)['b4_1'];
                $this->b4_2 = session('Step'.$step)['b4_2'];
            }
        }else if($step == 15 && session()->has('Step15')){
            $this->c1_1 = session('Step15')['c1_1'];
            $this->c1_2 = session('Step15')['c1_2'];
            $this->c2_1 = session('Step15')['c2_1'];
            $this->c2_2 = session('Step15')['c2_2'];
            $this->c3_1 = session('Step15')['c3_1'];
            $this->c3_2 = session('Step15')['c3_2'];
        }else if($step == 16 && session()->has('Step16')){
            $this->d1_1 = session('Step16')['d1_1'];
            $this->d1_2 = session('Step16')['d1_2'];
            $this->d2_1 = session('Step16')['d2_1'];
            $this->d2_2 = session('Step16')['d2_2'];
            $this->d3_1 = session('Step16')['d3_1'];
            $this->d3_2 = session('Step16')['d3_2'];
            $this->d4_1 = session('Step16')['d4_1'];
            $this->d4_2 = session('Step16')['d4_2'];
        }else if($step == 17 && session()->has('Step17')){
            $this->e1_1 = session('Step17')['e1_1'];
            $this->e1_2 = session('Step17')['e1_2'];
            $this->e2_1 = session('Step17')['e2_1'];
            $this->e2_2 = session('Step17')['e2_2'];
        }
        $this->currentStep = $step;
    }

    public function render(){
        $this->provincis = DB::table('wilayah')
            ->whereRaw('kode = "32" OR kode = "19"')
            ->orderBy('nama','asc')
            ->get();

        $this->kotas = DB::table('wilayah')
            ->whereRaw('LEFT(kode, "2") = "'.$this->selectedProvinsi.'" AND CHAR_LENGTH(kode) = 5')
            ->orderBy('nama','asc')
            ->get();

        $this->kecamatans = DB::table('wilayah')
            ->whereRaw('LEFT(kode, "5") = "'.$this->selectedKota.'" AND CHAR_LENGTH(kode) = 8')
            ->orderBy('nama','asc')
            ->get();

        $this->kelurahans = DB::table('wilayah')
            ->whereRaw('LEFT(kode, "8") = "'.$this->selectedKecamatan.'" AND CHAR_LENGTH(kode) = 13')
            ->orderBy('nama','asc')
            ->get();

        $data = array(
            "akun" => session('PegawaiLoged')
        );
        return view('livewire.multi-step-form',$data);
    }

    public function updatingSelectedProvinsi(){
        $this->selectedKota = null;
        $this->selectedKecamatan = null;
    }

    public function updatingSelectedKota(){
        $this->selectedKecamatan = null;
    }

    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                "nama_responden" => "required",
                "usia" => "required",
                "jabatan" => "required",
                "gender" => "required",
                "selectedProvinsi" => "required",
                "selectedKota" => "required",
                "selectedKecamatan" => "required",
                "selectedDesa" => "required"
            ],[
                "nama_responden.required" => "Nama Responden Tidak Boleh Kosong!",
                "usia.required" => "Usia Tidak Boleh Kosong",
                "jabatan.required" => "Jabatan Tidak Boleh Kosong",
                "gender.required" => "Silahkan Pilih Jenis Kelamin",
                "selectedProvinsi.required" => "Silahkan Pilih Provinsi",
                "selectedKota.required" => "Silahkan Pilih Kabupaten/Kota",
                "selectedKecamatan.required" => "Silahkan Pilih Kecamatan",
                "selectedDesa.required" => "Silahkan Pilih Desa"
            ]);
        }else if($this->currentStep > 2 && $this->currentStep < 15){
            $this->validate([
                "a1_1" => "required",
                "a1_2" => "required_if:a1_1,1",
                "a2_1" => "required",
                "a2_2" => "required_if:a2_1,1",
                "a3_1" => "required",
                "a3_2" => "required_if:a3_1,1",
                "a4_1" => "required",
                "a4_2" => "required_if:a4_1,1",
                "a5_1" => "required",
                "a5_2" => "required_if:a5_1,1",
                "b1_1" => "required",
                "b1_2" => "required_if:b1_1,1",
                "b2_1" => "required",
                "b2_2" => "required_if:b2_1,1",
                "b3_1" => "required",
                "b3_2" => "required_if:b3_1,1",
                "b4_1" => "required",
                "b4_2" => "required_if:b4_1,1"
            ],[
                "required" => "Harap Pilih Salah Satu!",
                "required_if" => "Harap Pilih Salah Satu!"
            ]);
        }else if($this->currentStep == 15){
            $this->validate([
                "c1_1" => "required",
                "c1_2" => "required_if:c1_1,1",
                "c2_1" => "required",
                "c2_2" => "required_if:c2_1,1",
                "c3_1" => "required",
                "c3_2" => "required_if:c3_1,1"
            ],[
                "required" => "Harap Pilih Salah Satu!",
                "required_if" => "Harap Pilih Salah Satu!"
            ]);
        }else if($this->currentStep == 16){
            $this->validate([
                "d1_1" => "required",
                "d1_2" => "required_if:d1_1,1",
                "d2_1" => "required",
                "d2_2" => "required_if:d2_1,1",
                "d3_1" => "required",
                "d3_2" => "required_if:d3_1,1",
                "d4_1" => "required",
                "d4_2" => "required_if:d4_1,1"
            ],[
                "required" => "Harap Pilih Salah Satu!",
                "required_if" => "Harap Pilih Salah Satu!"
            ]);
        }else if($this->currentStep == 17){
            $this->validate([
                "e1_1" => "required",
                "e1_2" => "required_if:e1_1,1",
                "e2_1" => "required",
                "e2_2" => "required_if:e2_1,1"
            ],[
                "required" => "Harap Pilih Salah Satu!",
                "required_if" => "Harap Pilih Salah Satu!"
            ]);
        }
    }

    public function putSession(){
        if($this->currentStep == 1){
            session()->put('Step1',array(
                "nama_responden" => $this->nama_responden,
                "jabatan" => $this->jabatan,
                "usia" => $this->usia,
                "gender" => $this->gender,
                "provinsi" => $this->selectedProvinsi,
                "kota" => $this->selectedKota,
                "kecamatan" => $this->selectedKecamatan,
                "desa" => $this->selectedDesa
            ));
        }else if($this->currentStep == 2){
            session()->put('Step2',array(
                "3" => $this->gempa_bumi,
                "4" => $this->tsunami,
                "5" => $this->banjir,
                "6" => $this->tanah_longsor,
                "7" => $this->gunung_meletus,
                "8" => $this->kekeringan,
                "9" => $this->abrasi,
                "10" => $this->cuaca_ekstrim,
                "11" => $this->kebakaran_hutan,
                "12" => $this->epidemi,
                "13" => $this->kegagalan_teknologi,
                "14" => $this->konflik_sosial
            ));
        }else if($this->currentStep > 2 && $this->currentStep < 15){
            session()->put('Step'.$this->currentStep,array(
                "a1_1" => $this->a1_1,
                "a1_2" => $this->a1_2,
                "a2_1" => $this->a2_1,
                "a2_2" => $this->a2_2,
                "a3_1" => $this->a3_1,
                "a3_2" => $this->a3_2,
                "a4_1" => $this->a4_1,
                "a4_2" => $this->a4_2,
                "a5_1" => $this->a5_1,
                "a5_2" => $this->a5_2,
                "b1_1" => $this->b1_1,
                "b1_2" => $this->b1_2,
                "b2_1" => $this->b2_1,
                "b2_2" => $this->b2_2,
                "b3_1" => $this->b3_1,
                "b3_2" => $this->b3_2,
                "b4_1" => $this->b4_1,
                "b4_2" => $this->b4_2
            ));
        }else if($this->currentStep == 15){
            session()->put('Step15',array(
                "c1_1" => $this->c1_1,
                "c1_2" => $this->c1_2,
                "c2_1" => $this->c2_1,
                "c2_2" => $this->c2_2,
                "c3_1" => $this->c3_1,
                "c3_2" => $this->c3_2
            ));
        }else if($this->currentStep == 16){
            session()->put('Step16',array(
                "d1_1" => $this->d1_1,
                "d1_2" => $this->d1_2,
                "d2_1" => $this->d2_1,
                "d2_2" => $this->d2_2,
                "d3_1" => $this->d3_1,
                "d3_2" => $this->d3_2,
                "d4_1" => $this->d4_1,
                "d4_2" => $this->d4_2
            ));
        }else if($this->currentStep == 17){
            session()->put('Step17',array(
                "e1_1" => $this->e1_1,
                "e1_2" => $this->e1_2,
                "e2_1" => $this->e2_1,
                "e2_2" => $this->e2_2
            ));
        }
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->putSession();
        $this->currentStep += 1;
        if($this->currentStep > 2 && $this->currentStep < 15){
            foreach(session('Step2') as $key => $value){
                if($this->currentStep > 2 && $this->currentStep < 15){
                    if(session('Step2')[strval($this->currentStep)] != null){
                        break;
                    }else{
                        if($this->currentStep < 15){
                            $this->currentStep += 1;
                        }else{
                            break;
                        }
                    }
                }else{
                    break;
                }
            }
        }
        return redirect()->route('user.survei',$this->currentStep);
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->putSession();
        $this->currentStep -= 1;
        if($this->currentStep > 2 && $this->currentStep < 15){
            foreach(session('Step2') as $key => $value){
                if($this->currentStep > 2 && $this->currentStep < 15){
                    if(session('Step2')[strval($this->currentStep)] != null){
                        break;
                    }else{
                        if($this->currentStep < 15){
                            $this->currentStep -= 1;
                        }else{
                            break;
                        }
                    }
                }else{
                    break;
                }
            }
        }
        return redirect()->route('user.survei',$this->currentStep);
    }

    public function saveToDB(){
        $this->validateData();

        session()->put('Step17',array(
            "e1_1" => $this->e1_1,
            "e1_2" => $this->e1_2,
            "e2_1" => $this->e2_1,
            "e2_2" => $this->e2_2
        ));

        $data = [];

        //Insert to Responden
        DB::table('responden')->insert([
            'nama_responden' => session('Step1')['nama_responden'],
            'usia_responden' => session('Step1')['usia'],
            'jabatan_responden' => session('Step1')['jabatan'],
            'jenis_kelamin' => session('Step1')['gender'],
            'kode' => session('Step1')['desa']
        ]);
        $no = DB::table('responden')->select('no_responden')->latest('no_responden')->first()->no_responden ?? 0;
        $data['responden'] = $no;

        //Updating Column Wilayah
        DB::table('wilayah')
            ->where('kode',session('Step1')['desa'])
            ->update(['no_responden'=>$data['responden']]);

        //Insert to Param 3
        DB::table('param_3')->insert([
                'c1_1' => session('Step15')['c1_1'],
                'c1_2' => session('Step15')['c1_2'] ?? 0,
                'c2_1' => session('Step15')['c2_1'],
                'c2_2' => session('Step15')['c2_2'] ?? 0,
                'c3_1' => session('Step15')['c3_1'],
                'c3_2' => session('Step15')['c3_2'] ?? 0
        ]);
        $no = DB::table('param_3')->select('no_param_3')->latest('no_param_3')->first()->no_param_3 ?? 0;
        $data['param_3'] = $no;

        //Insert to Param 4
        DB::table('param_4')->insert([
                'd1_1' => session('Step16')['d1_1'],
                'd1_2' => session('Step16')['d1_2'] ?? 0,
                'd2_1' => session('Step16')['d2_1'],
                'd2_2' => session('Step16')['d2_2'] ?? 0,
                'd3_1' => session('Step16')['d3_1'],
                'd3_2' => session('Step16')['d3_2'] ?? 0,
                'd4_1' => session('Step16')['d4_1'],
                'd4_2' => session('Step16')['d4_2'] ?? 0
        ]);
        $no = DB::table('param_4')->select('no_param_4')->latest('no_param_4')->first()->no_param_4 ?? 0;
        $data['param_4'] = $no;

        //Insert to Param 5
        DB::table('param_5')->insert([
                'e1_1' => session('Step17')['e1_1'],
                'e1_2' => session('Step17')['e1_2'] ?? 0,
                'e2_1' => session('Step17')['e2_1'],
                'e2_2' => session('Step17')['e2_2'] ?? 0
        ]);
        $no = DB::table('param_5')->select('no_param_5')->latest('no_param_5')->first()->no_param_5 ?? 0;
        $data['param_5'] = $no;

        for($i = 1; $i <= 12; $i++){
            if(session()->has('Step'.($i+2))){
                //Insert to Param 1
                DB::table('param_1')->insert([
                    'a1_1' => session('Step'.($i+2))['a1_1'],
                    'a1_2' => session('Step'.($i+2))['a1_2'] ?? 0,
                    'a2_1' => session('Step'.($i+2))['a2_1'],
                    'a2_2' => session('Step'.($i+2))['a2_2'] ?? 0,
                    'a3_1' => session('Step'.($i+2))['a3_1'],
                    'a3_2' => session('Step'.($i+2))['a3_2'] ?? 0,
                    'a4_1' => session('Step'.($i+2))['a4_1'],
                    'a4_2' => session('Step'.($i+2))['a4_2'] ?? 0,
                    'a5_1' => session('Step'.($i+2))['a5_1'],
                    'a5_2' => session('Step'.($i+2))['a5_2'] ?? 0
                ]);
                $no = DB::table('param_1')->select('no_param_1')->latest('no_param_1')->first()->no_param_1 ?? 0;
                $data['param_1_'.$i] = $no;

                //Insert to Param 2
                DB::table('param_2')->insert([
                    'b1_1' => session('Step'.($i+2))['b1_1'],
                    'b1_2' => session('Step'.($i+2))['b1_2'] ?? 0,
                    'b2_1' => session('Step'.($i+2))['b2_1'],
                    'b2_2' => session('Step'.($i+2))['b2_2'] ?? 0,
                    'b3_1' => session('Step'.($i+2))['b3_1'],
                    'b3_2' => session('Step'.($i+2))['b3_2'] ?? 0,
                    'b4_1' => session('Step'.($i+2))['b4_1'],
                    'b4_2' => session('Step'.($i+2))['b4_2'] ?? 0
                ]);
                $no = DB::table('param_2')->select('no_param_2')->latest('no_param_2')->first()->no_param_2 ?? 0;
                $data['param_2_'.$i] = $no;

                session()->pull('Step'.($i+2));
            }else{
                //Insert to Param 1
                DB::table('param_1')->insert([
                    'a1_1' => 0,
                    'a1_2' => 0,
                    'a2_1' => 0,
                    'a2_2' => 0,
                    'a3_1' => 0,
                    'a3_2' => 0,
                    'a4_1' => 0,
                    'a4_2' => 0,
                    'a5_1' => 0,
                    'a5_2' => 0
                ]);
                $no = DB::table('param_1')->select('no_param_1')->latest('no_param_1')->first()->no_param_1 ?? 0;
                $data['param_1_'.$i] = $no;

                //Insert to Param 2
                DB::table('param_2')->insert([
                    'b1_1' => 0,
                    'b1_2' => 0,
                    'b2_1' => 0,
                    'b2_2' => 0,
                    'b3_1' => 0,
                    'b3_2' => 0,
                    'b4_1' => 0,
                    'b4_2' => 0
                ]);
                $no = DB::table('param_2')->select('no_param_2')->latest('no_param_2')->first()->no_param_2 ?? 0;
                $data['param_2_'.$i] = $no;
            }
            //Insert to Param 1_2
            DB::table('param_1_2')->insert([
                'no_bencana' => $i,
                'no_param_1' => $data['param_1_'.$i],
                'no_param_2' => $data['param_2_'.$i]
            ]);
            $no = DB::table('param_1_2')->select('no_param_1_2')->latest('no_param_1_2')->first()->no_param_1_2 ?? 0;
            $data['param_1_2_'.$i] = $no;

            $tanggal = DB::table('tanggal_survei')->where('status','<>','2')->orderBy('mulai_survei','asc')->first();
            //Insert to Survey
            DB::table('survey')->insert([
                'NIP' => session('PegawaiLoged')->NIP,
                'no_responden' => $data['responden'],
                'no_param_1_2' => $data['param_1_2_'.$i],
                'no_param_3' => $data['param_3'],
                'no_param_4' => $data['param_4'],
                'no_param_5' => $data['param_5'],
                'Surveyor' => session('PegawaiLoged')["nama_pegawai"],
                'id_tanggal_survei' => $tanggal->id,
                'tanggal_survey' => date("Y-m-d")
            ]);
        }
        session()->pull('Step1');
        session()->pull('Step2');
        session()->pull('Step15');
        session()->pull('Step16');
        session()->pull('Step17');

        return redirect()->route('user.lihat-survei');
    }

    public function batal(){
        for($i=1; $i <= 17; $i++){
            if(session()->has('Step'.$i)){
                session()->pull('Step'.$i);
            }
        }

        return redirect()->route('user.dashboard');
    }
}
