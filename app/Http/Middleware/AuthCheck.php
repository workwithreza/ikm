<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){

        if(!session()->has('PegawaiLoged') && ($request->path() != '/')){
            return redirect()->route('login')->with('fail','Harap Login Terlebih Dahulu!');
        }

        if(session()->has('PegawaiLoged') && ($request->path() == '/')){
            return back();
        }

        return $next($request);
    }
}
