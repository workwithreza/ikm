<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    public function dashboard(){
        $data = array("akun" => session('PegawaiLoged'));
        return view('pegawai.pegawai',$data);
    }

    public function survei($step){
        $data = array(
            "akun" => session('PegawaiLoged'),
            "step" => $step
        );
        return view('pegawai.survei',$data);
    }

    public function lihat(){
        $data = array(
            "akun" => session('PegawaiLoged'),
            "list" => DB::table('survey')
                        ->join('responden','survey.no_responden', '=', 'responden.no_responden')
                        ->join('wilayah','wilayah.kode', '=', 'responden.kode')
                        ->select('survey.no_responden','responden.nama_responden','survey.tanggal_survey','wilayah.nama')
                        ->distinct()
                        ->get()
        );
        return view('pegawai.lihat-survei', $data);
    }

    public function detail($no_responden){
        $no_param_3 = DB::table('survey')->select('no_param_3')->where('no_responden','=',$no_responden)->distinct()->get()->first()->no_param_3;
        $no_param_4 = DB::table('survey')->select('no_param_4')->where('no_responden','=',$no_responden)->distinct()->get()->first()->no_param_4;
        $no_param_5 = DB::table('survey')->select('no_param_5')->where('no_responden','=',$no_responden)->distinct()->get()->first()->no_param_5;

        $no_param_1_2 = DB::table('survey')->select('no_param_1_2')->where('no_responden','=',$no_responden)->get();

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

        $data = array(
            "param_1_2" => $param_1_2,
            "param_3" => $param_3,
            "param_4" => $param_4,
            "param_5" => $param_5,
            "bencana" => $bencana
        );

        return view('pegawai.detail-survei',$data);
    }

    public function logout(){
        if(session()->has('PegawaiLoged')){
            session()->pull('PegawaiLoged');
            return redirect()->route('login');
        }
    }
}
