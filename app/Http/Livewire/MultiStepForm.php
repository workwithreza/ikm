<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultiStepForm extends Component{
    public $kotas;
    public $kecamatans;
    public $kelurahans;

    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedDesa = null;

    public $log = [];

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
}
