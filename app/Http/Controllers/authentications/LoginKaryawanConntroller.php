<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Karyawan as MiddlewareKaryawan;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginKaryawanConntroller extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-karyawan', ['pageConfigs' => $pageConfigs]);
  }

  public function loginKaryawan(Request $request)
  {
    // return $request->all();
    // dd(Auth::guard('karyawan')->attempt($request->only('email', 'password')));
      if(Auth::guard('web')->attempt($request->only('email', 'password'))) {
          $user = Auth::guard('web')->user();
          Session::put('web', $user);
          // dd($user);
          return redirect()->route('dashboard-karyawan');
      } else {
          return back()->with('error', 'Maaf Email dan Password yang Anda Masukkan Salah!');
      }
  }

        public function logout()
      {
          Auth::guard('web')->logout();
          return redirect()->route('auth-login-karyawan'); // Redirect ke halaman login atau halaman lain yang Anda tentukan
      }
}
