<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Models\karyawan;
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
    // dd($request);
      if(Auth::guard('karyawan')->attempt($request->only('email', 'password'))) {
          // dd($request);
          $user = Auth::guard('karyawan')->user();
          Session::put('karyawan', $user);
          // dd($user);

          return redirect()->route('dashboard-karyawan');
      } else {
          // return back()->with('error', 'Maaf Email dan Password yang Anda Masukkan Salah!');
          return redirect()->route('dashboard-karyawan');
      }
  }
}
