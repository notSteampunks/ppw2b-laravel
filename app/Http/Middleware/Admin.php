<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //Membuat Middleware Admin
    public function handle($request, Closure $next){
        if(!(Auth::user()->level == 'admin')){
            return redirect()->back();
        }
        return $next($request);
    }
}