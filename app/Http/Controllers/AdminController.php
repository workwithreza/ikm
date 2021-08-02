<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{
    public function dashboard(){
        $data = array("akun" => session('PegawaiLoged'));
        return view('admin.dashboard', $data);
    }

    public function akun(){
        $data = array(
            "list" => DB::table('pegawais')->get(),
            "akun" => session('PegawaiLoged')
        );
        return view('admin.maccount',$data);
    }

    public function tambah(Request $request){
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

    public function edit(Request $request){
        $request->validate([
            'nipedit' => 'required',
            'namaedit' => 'required',
            'usernameedit' => 'required',
            'passwordedit' => 'required'
        ]);

        $edit = DB::table('pegawais')->where('NIP',$request->input('nipedit'))
        ->update([
            "nama_pegawai" => $request->input('namaedit'),
            "username_pegawai" => $request->input('usernameedit'),
            "password_pegawai" => md5($request->input('passwordedit'))
        ]);

        if($edit){
            return back()->with('berhasil', "Berhasil Update Data Pegawai");
        }
        return back()->with('gagal', 'Gagal Menambahkan Data Pegawai');
    }

    public function hapus($NIP){
        $hapus = DB::table('pegawais')->where('NIP', $NIP)->delete();
        return back()->with('hapus','Berhasil Hapus Data');
    }

    public function logout(){
        if(session()->has('PegawaiLoged')){
            session()->pull('PegawaiLoged');
            return redirect()->route('login');
        }
    }
}
