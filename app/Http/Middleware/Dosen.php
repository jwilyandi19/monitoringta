<?php

namespace App\Http\Middleware;

use Closure;

class Dosen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('user')){
            return redirect('/home')->withErrors('Halaman Tidak Ditemukan');
        }
        else{
            if(session('user')['role'] != 2){
                return redirect('/home')->withErrors('Halaman Tidak Ditemukan');
            }
            return $next($request);
        }
    }
}
