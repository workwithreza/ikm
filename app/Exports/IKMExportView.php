<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class IKMExportView implements FromView
{

    protected $no_responden;

    function __construct($no_responden)
    {
        $this->no_responden = $no_responden;
    }

    public function view():View{
        $no_param_3 = DB::table('survey')->select('no_param_3')->where('no_responden','=',$this->no_responden)->distinct()->get()->first()->no_param_3;
        $no_param_4 = DB::table('survey')->select('no_param_4')->where('no_responden','=',$this->no_responden)->distinct()->get()->first()->no_param_4;
        $no_param_5 = DB::table('survey')->select('no_param_5')->where('no_responden','=',$this->no_responden)->distinct()->get()->first()->no_param_5;

        $no_param_1_2 = DB::table('survey')->select('no_param_1_2')->where('no_responden','=',$this->no_responden)->get();

        $param_3 = DB::table('param_3')->where('no_param_3','=',$no_param_3)->get();
        $param_4 = DB::table('param_4')->where('no_param_4','=',$no_param_4)->get();
        $param_5 = DB::table('param_5')->where('no_param_5','=',$no_param_5)->get();

        $i = 1;
        $param_1_2 = [];
        foreach($no_param_1_2 as $key => $value){
            $no_param_1 = DB::table('param_1_2')->select('no_param_1')->where('no_param_1_2','=',$value->no_param_1_2)->first()->no_param_1;
            $no_param_2 = DB::table('param_1_2')->select('no_param_2')->where('no_param_1_2','=',$value->no_param_1_2)->first()->no_param_2;
            $param_1_2[$i] = array(
                "param_1" => DB::table('param_1')->where('no_param_1','=',$no_param_1)->get(),
                'param_2' => DB::table('param_2')->where('no_param_2','=',$no_param_2)->get()
            );
            $i += 1;
        }

        $bencana = DB::table('bencana')->get();
        $responden = DB::table('responden')->join('wilayah','wilayah.kode','=','responden.kode')->where('responden.no_responden','=',$this->no_responden)->first();
        $pegawai = DB::table('survey')->select('pegawais.*','survey.tanggal_survey')->join('pegawais','survey.NIP','=','pegawais.NIP')->where('survey.no_responden','=',$this->no_responden)->first();
        $surveyor = DB::table('survey')->select('surveyor','tanggal_survey')->where('survey.no_responden','=',$this->no_responden)->first();
        if($surveyor->surveyor == NULL){
            $pegawai = DB::table('survey')->select('pegawais.*','survey.tanggal_survey')->join('pegawais','survey.NIP','=','pegawais.NIP')->where('survey.no_responden','=',$this->no_responden)->first();
            $surveyor->surveyor = $pegawai->nama_pegawai;
        }


        $kode_provinsi = substr($responden->kode,0,2);
        $kode_kota = substr($responden->kode,0,5);
        $kode_kecamatan = substr($responden->kode,0,8);

        $wilayah = array(
            "provinsi" => DB::table('wilayah')->where('kode','=',$kode_provinsi)->first(),
            "kota" => DB::table('wilayah')->where('kode','=',$kode_kota)->first(),
            "kecamatan" => DB::table('wilayah')->where('kode','=',$kode_kecamatan)->first()
        );

        $data = array(
            "param_1_2" => $param_1_2,
            "param_3" => $param_3,
            "param_4" => $param_4,
            "param_5" => $param_5,
            "bencana" => $bencana,
            'responden' => $responden,
            'pegawai' => $surveyor,
            'wilayah' => $wilayah
        );

        return view('pegawai.table-ikm',$data);
    }
}
