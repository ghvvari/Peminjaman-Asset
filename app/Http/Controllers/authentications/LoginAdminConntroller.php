<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginAdminConntroller extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-admin', ['pageConfigs' => $pageConfigs]);
  }

  public function loginAdmin(Request $request)
  {
    // return $request->all();
    // dd(Auth::guard('admin')->attempt($request->only('email', 'password')));
      if(Auth::guard('admin')->attempt($request->only('nama_karyawan','email', 'password'))) {
          $user = Auth::guard('admin')->user();
          Session::put('admin', $user);
          // dd($user);
          return redirect()->route('dashboard-karyawan');
      } else {
          return back()->with('error', 'Maaf Email dan Password yang Anda Masukkan Salah!');
      }
  }

        public function logout()
      {
          Auth::guard('admin')->logout();
          return redirect()->route('auth-login-karyawan'); // Redirect ke halaman login atau halaman lain yang Anda tentukan
      }
}
