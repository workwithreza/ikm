<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{
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

            $query = DB::table('pegawais')->insert([
                'NIP' => $request->input('nip'),
                'nama_pegawai' => $request->input('nama'),
                'username_pegawai' => $request->input('username'),
                'password_pegawai' => md5($request->input('password'))
            ]);

            if($query){
                return back()->with('berhasil', 'Berhasil Menambahkan Data Pegawai');
            }else{
                return back()->with('gagal', 'Gagal Menambahkan Data Pegawai');
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

    public function logout(){
        if(session()->has('PegawaiLoged')){
            session()->pull('PegawaiLoged');
            return redirect()->route('login');
        }
        return back();
    }
}
