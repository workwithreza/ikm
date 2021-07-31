<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class MainController extends Controller{
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
