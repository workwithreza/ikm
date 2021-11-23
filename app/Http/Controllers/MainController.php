<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller{
    public function __construct(){
        $tanggal = DB::table('tanggal_survei')->where('status','<>','2')->orderBy('mulai_survei','asc')->first();
        if($tanggal != null){
            if($tanggal->status == 0){
                $dateNow = strtotime(date('Y-m-d'));
                $dateStartSurvei = strtotime($tanggal->mulai_survei);
                $dateEndSurvei = strtotime($tanggal->akhir_survei);
                $gapMulai = round(($dateNow - $dateStartSurvei) / (60 * 60 * 24));
                $gapAkhir = round(($dateEndSurvei - $dateNow) / (60 * 60 * 24));
                if($gapMulai >= 0 && $gapAkhir >= 0){
                    DB::table('tanggal_survei')->where('id','=',$tanggal->id)->update([
                        'status' => 1
                    ]);
                }else if($gapAkhir < 0){
                    DB::table('tanggal_survei')->where('id','=',$tanggal->id)->update([
                        'status' => 2
                    ]);
                }
            }else if($tanggal->status == 1){
                $dateNow = strtotime(date('Y-m-d'));
                $dateEndSurvei = strtotime($tanggal->akhir_survei);
                $gapAkhir = round(($dateEndSurvei - $dateNow) / (60 * 60 * 24));
                if($gapAkhir < 0){
                    DB::table('tanggal_survei')->where('id','=',$tanggal->id)->update([
                        'status' => 2
                    ]);
                }
            }
        }
    }

    public function login(){
        return view('login');
    }

    public function check(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        $UserInfo = Pegawai::where('username_pegawai','=',$request->username)->first();

        if(!$UserInfo){
            return back()->with('fail','Akun tidak ditemukan');
        }else{
            if($UserInfo->password_pegawai == md5($request->password)){
                $request->session()->put('PegawaiLoged', $UserInfo);
                if($UserInfo->is_admin == 1){
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('user.dashboard');
                }
            }else{
                return back()->with('fail','Password Tidak Sama');
            }
        }
    }
}
