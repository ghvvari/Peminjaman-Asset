<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

     public function handle($request, Closure $next, ...$guards){
      // dd($guards);
      if(in_array('admin', $guards)){
        if(!auth()->guard('admin')->check()){
          return redirect()->route('auth-login-admin');
        }
      }else{
        if(!auth()->guard('web')->check()){
          return redirect()->route('auth-login-karyawan');
        }
      }
      return $next($request);
    }
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }
}
