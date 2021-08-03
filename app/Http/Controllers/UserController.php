<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller{
    public function dashboard(){
        $data = array("akun" => session('PegawaiLoged'));
        return view('pegawai.pegawai',$data);
    }

    public function survei(){
        $data = array(
            "akun" => session('PegawaiLoged')
        );
        return view('pegawai.survei',$data);
    }

    public function logout(){
        if(session()->has('PegawaiLoged')){
            session()->pull('PegawaiLoged');
            return redirect()->route('login');
        }
    }
}
