<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller{
    public function dashboard(){
        return view('admin.dashboard');

    }

    public function logout(){
        if(session()->has('PegawaiLoged')){
            session()->pull('PegawaiLoged');
            return redirect()->route('login');
        }
    }
}
