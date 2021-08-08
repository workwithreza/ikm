<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MultiStepForm extends Component{
    public $nama_responden;
    public $usia;
    public $jabatan;
    public $gender;

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

    public $c1_1;
    public $c1_2;
    public $c2_1;
    public $c2_2;
    public $c3_1;
    public $c3_2;

    public $d1_1;
    public $d1_2;
    public $d2_1;
    public $d2_2;
    public $d3_1;
    public $d3_2;
    public $d4_1;
    public $d4_2;

    public $e1_1;
    public $e1_2;
    public $e2_1;
    public $e2_2;

    public $kotas;
    public $kecamatans;
    public $kelurahans;

    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedDesa = null;

    public $currentStep = 1;
    public $lastStep = 16;

    public function mount($step){
        if($step == 1){
            if(session()->has('Step1')){
                $this->nama_responden = session('Step1')['nama_responden'];
                $this->jabatan = session('Step1')['jabatan'];
                $this->usia = session('Step1')['usia'];
                $this->gender = session('Step1')['gender'];

                $this->selectedKota = session('Step1')['kota'];
                $this->selectedKecamatan = session('Step1')['kecamatan'];
                $this->selectedDesa = session('Step1')['desa'];
            }
        }else if($step > 1 && $step < 14){
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
        }else if(session()->has('Step14')){
            $this->c1_1 = session('Step14')['c1_1'];
            $this->c1_2 = session('Step14')['c1_2'];
            $this->c2_1 = session('Step14')['c2_1'];
            $this->c2_2 = session('Step14')['c2_2'];
            $this->c3_1 = session('Step14')['c3_1'];
            $this->c3_2 = session('Step14')['c3_2'];
        }else if(session()->has('Step15')){
            $this->d1_1 = session('Step15')['d1_1'];
            $this->d1_2 = session('Step15')['d1_2'];
            $this->d2_1 = session('Step15')['d2_1'];
            $this->d2_2 = session('Step15')['d2_2'];
            $this->d3_1 = session('Step15')['d3_1'];
            $this->d3_2 = session('Step15')['d3_2'];
            $this->d4_1 = session('Step15')['d4_1'];
            $this->d4_2 = session('Step15')['d4_2'];
        }else if(session()->has('Step16')){
            $this->e1_1 = session('Step16')['e1_1'];
            $this->e1_2 = session('Step16')['e1_2'];
            $this->e2_1 = session('Step16')['e2_1'];
            $this->e2_2 = session('Step16')['e2_2'];
        }
        $this->currentStep = $step;
    }

    public function render(){
        $this->kotas = DB::table('wilayah_2020')
            ->whereRaw('LEFT(kode, "2") = "32" AND CHAR_LENGTH(kode) = 5')
            ->orderBy('nama','asc')
            ->get();

        $this->kecamatans = DB::table('wilayah_2020')
            ->whereRaw('LEFT(kode, "5") = "'.$this->selectedKota.'" AND CHAR_LENGTH(kode) = 8')
            ->orderBy('nama','asc')
            ->get();

        $this->kelurahans = DB::table('wilayah_2020')
            ->whereRaw('LEFT(kode, "8") = "'.$this->selectedKecamatan.'" AND CHAR_LENGTH(kode) = 13')
            ->orderBy('nama','asc')
            ->get();

        $data = array(
            "akun" => session('PegawaiLoged')
        );
        return view('livewire.multi-step-form',$data);
    }

    public function putSession(){
        if($this->currentStep == 1){
            session()->put('Step1',array(
                "nama_responden" => $this->nama_responden,
                "jabatan" => $this->jabatan,
                "usia" => $this->usia,
                "gender" => $this->gender,
                "kota" => $this->selectedKota,
                "kecamatan" => $this->selectedKecamatan,
                "desa" => $this->selectedDesa
            ));
        }else if($this->currentStep > 1 && $this->currentStep < 14){
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
        }else if($this->currentStep == 14){
            session()->put('Step14',array(
                "c1_1" => $this->c1_1,
                "c1_2" => $this->c1_2,
                "c2_1" => $this->c2_1,
                "c2_2" => $this->c2_2,
                "c3_1" => $this->c3_1,
                "c3_2" => $this->c3_2
            ));
        }else if($this->currentStep == 15){
            session()->put('Step15',array(
                "d1_1" => $this->d1_1,
                "d1_2" => $this->d1_2,
                "d2_1" => $this->d2_1,
                "d2_2" => $this->d2_2,
                "d3_1" => $this->d3_1,
                "d3_2" => $this->d3_2,
                "d4_1" => $this->d4_1,
                "d4_2" => $this->d4_2
            ));
        }else if($this->currentStep == 16){
            session()->put('Step16',array(
                "e1_1" => $this->e1_1,
                "e1_2" => $this->e1_2,
                "e2_1" => $this->e2_1,
                "e2_2" => $this->e2_2
            ));
        }
    }

    public function increaseStep(){
        $this->putSession();
        $this->currentStep += 1;
        return redirect()->route('user.survei',$this->currentStep);
    }

    public function decreaseStep(){
        $this->putSession();
        $this->currentStep -= 1;
        return redirect()->route('user.survei',$this->currentStep);
    }
}
