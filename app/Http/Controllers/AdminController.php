<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{
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

    public function dashboard(){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $data = array(
                "akun" => session('PegawaiLoged'),
                "jumlah_pegawai" => DB::table('pegawais')->count(),
                'total_survey' => DB::table('survey')->distinct('no_param_3')->count()
            );
            return view('admin.dashboard', $data);
        }
        return back()->withInput();
    }

    public function akun(){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $data = array(
                "list" => DB::table('pegawais')->get(),
                "akun" => session('PegawaiLoged')
            );
            return view('admin.maccount',$data);
        }
        return back()->withInput();
    }

    public function tambah(Request $request){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $request->validate([
                'nip' => 'required',
                'nama' => 'required',
                'username' => 'required',
                'password' => 'required'
            ]);

            $isNIPDuplicate = DB::table('pegawais')->get()->where('NIP','=',$request->input('nip'));
            $isUsernameDuplicate = DB::table('pegawais')->get()->where('username_pegawai','=',$request->input('username'));
            if($isNIPDuplicate->count() > 0 || $isUsernameDuplicate->count() > 0){
                return back()->with('gagal', 'Gagal Menambahkan Data Pegawai.<br>NIP atau Username Tidak Boleh Sama!');
            }else{
                $query = DB::table('pegawais')->insert([
                    'NIP' => $request->input('nip'),
                    'nama_pegawai' => $request->input('nama'),
                    'username_pegawai' => $request->input('username'),
                    'password_pegawai' => md5($request->input('password'))
                ]);
                return back()->with('berhasil', 'Berhasil Menambahkan Data Pegawai');
            }
        }
        return back()->withInput();
    }

    public function edit(Request $request){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $request->validate([
                'nipedit' => 'required',
                'namaedit' => 'required',
                'usernameedit' => 'required'
            ]);

            $pegawai = DB::table('pegawais')->where('username_pegawai','=',$request->input('usernameedit'))->where('nip','=',$request->input('nipedit'))->get();
            if($pegawai->count() == 0){
                $username = DB::table('pegawais')->where('username_pegawai','=',$request->input('usernameedit'))->get();
                if($username->count() > 0){
                    return back()->with('gagal', 'Gagal Update Data Pegawai');
                }
            }
            if($request->input('passwordedit')){
                $edit = DB::table('pegawais')->where('NIP',$request->input('nipedit'))
                ->update([
                    "nama_pegawai" => $request->input('namaedit'),
                    "username_pegawai" => $request->input('usernameedit'),
                    "password_pegawai" => md5($request->input('passwordedit'))
                    ]);
                return back()->with('berhasil', "Berhasil Update Data Pegawai");
            }else{
                $edit = DB::table('pegawais')->where('NIP',$request->input('nipedit'))
                ->update([
                    "nama_pegawai" => $request->input('namaedit'),
                    "username_pegawai" => $request->input('usernameedit')
                ]);
                return back()->with('berhasil', "Berhasil Update Data Pegawai");
            }

            return back()->with('gagal', 'Gagal Update Data Pegawai');
        }
        return back()->withInput();
    }

    public function hapus(Request $request){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $hapus = DB::table('pegawais')->where('NIP', $request->input('nip'))->delete();
            return back()->with('hapus','Berhasil Hapus Data');
        }
        return back()->withInput();
    }

    public function jadwal(){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $data = array(
                "list" => DB::table('tanggal_survei')->get(),
                "akun" => session('PegawaiLoged')
            );
            return view('admin.jadwal', $data);
        }
        return back()->withInput();
    }

    public function tambahJadwal(Request $request){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $request->validate([
                "mulai" => "required",
                "selesai" => "required",
                "batch" => "required"
            ],[
                "mulai.required" => "Tanggal Mulai Survei Tidak Boleh Kosong!",
                "selesai.required" => "Tanggal Selesai Survei Tidak Boleh Kosong!",
                "batch.required" => "Nama Batch Survei Tidak Boleh Kosong!"
            ]);

            $isExist = DB::table('tanggal_survei')->where('mulai_survei','=',$request->input('mulai'))->get();
            if($isExist->count() > 0){
                return back()->with('gagal','Tanggal Mulai Sudah Ada');
            }

            $isBetween = DB::table('tanggal_survei')->get();
            $inputMulai = strtotime($request->input('mulai'));
            $inputAkhir = strtotime($request->input('selesai'));
            foreach($isBetween as $key => $value){
                $mulai = strtotime($value->mulai_survei);
                $selesai = strtotime($value->akhir_survei);

                $gapMulai = round(($mulai - $inputMulai) / (60 * 60 * 24));
                if($gapMulai < 0){
                    $gapMulai = round(($selesai - $inputMulai) / (60 * 60 * 24));
                    if($gapMulai >= 0){
                        return back()->with('gagal',"Gagal Menambahkan, Tanggal Berada di Antara Sebuah Batch");
                    }
                }
                $gapMulaidanSelesai = round(($mulai - $inputAkhir) / (60 * 60 * 24));
                $gapSelesai = round(($selesai - $inputAkhir) / (60 * 60 * 24));
                if($gapMulaidanSelesai <= 0 && $gapSelesai >= 0){
                    return back()->with('gagal',"Gagal Menambahkan, Tanggal Berada di Antara Sebuah Batch");
                }
            }

            DB::table('tanggal_survei')->insert([
                'mulai_survei' => $request->input('mulai'),
                'akhir_survei' => $request->input('selesai'),
                'batch' => $request->input('batch'),
                'status' => 0
            ]);

            return back()->with('berhasil','Tambah Jadwal Survei Berhasil!');
        }
        return back()->withInput();
    }

    public function hapusJadwal(Request $request){
        if(session('PegawaiLoged')["is_admin"] == 1){
            $hapus = DB::table('tanggal_survei')->where('id', $request->input('id'))->delete();
            return back()->with('hapus','Berhasil Hapus Data');
        }
        return back()->withInput();
    }

    public function logout(){
        if(session()->has('PegawaiLoged')){
            session()->pull('PegawaiLoged');
            return redirect()->route('login');
        }
        return back();
    }
}
