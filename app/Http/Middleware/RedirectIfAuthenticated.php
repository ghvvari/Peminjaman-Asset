<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle($request, Closure $next, $guard = null){
      dd($guard);
      if($guard === 'admin'){
        if(Auth::guard($guard)->check()){
          return redirect()->route('dashboard-admin');
        }else{
          return redirect()->route('auth-login-admin');
        }
      }elseif($guard === 'web'){
        if(Auth::guard($guard)->check()){
          return redirect()->route('dashboard-karyawan');
        }else{
          return redirect()->route('auth-login-karyawan');
        }
      }

      return $next($request);

     }

    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::HOME);
    //         }
    //     }

    //     return $next($request);
    // }
}
