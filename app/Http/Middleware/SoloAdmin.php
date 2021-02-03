<?php

namespace App\Http\Middleware;

//Necesitamos colocar esta ruta.
use Illuminate\Support\Facades\Auth;
use Closure;    
use Illuminate\Http\Request;


class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->tipo){
           case('1'):
                return redirect('superAdmin');
                break;
            case('2'):
                return $next($request);
                break;
            case('3'):
                return redirect('moderador');
                break;
            case('4'):
                return redirect('user');
                break;
       }  
    }
}
