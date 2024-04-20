<?php

namespace App\Http\Controllers\Belakang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function getDetails(Request $request)
  {
    $username = $request->input('username');
    $karyawan = Karyawan::where('username', $username)->first();
    $password = Crypt::decryptString($karyawan->password);
    if ($karyawan) {
      return response()->json([
        'password' => $password,
        'email' => $karyawan->email,
      ]);
    } else {
      return response()->json(['error' => 'Karyawan not found'], 404);
    }
  }

  public function index()
  {
    $admin = Admin::all();
    $karyawan = Karyawan::all();
    return view('content.pages.belakang.admin.index', compact(['admin', 'karyawan']));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('content.pages.belakang.admin.add');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // return $request->all();
    $request->validate([
      'username' => 'required|string|max:255',
      'level' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
  ]);
  DB::beginTransaction();

  try {
    $admin = new Admin();
    $admin->username = $request->username;
    $admin->password = Crypt::encryptString($request->password);
    $admin->level = $request->level;
    $admin->email = $request->email;
    $admin->save();

    DB::commit();

    return redirect()
      ->route('admin.index')
      ->with('success', 'Sukses menambahkan Data');
  } catch (\Throwable $th) {

    dd($th);
    DB::rollBack();
    return redirect()
      ->route('karyawan.add')
      ->with('error', 'Gagal menambahkan Data');
  }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $admin = Admin::where('id', $id)->first();
    $karyawan = Karyawan::all();
    return view('content.pages.belakang.admin.edit', compact('admin','karyawan'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // return $request->all();
      $request->validate([
      'username' => 'required|string|max:255',
      'level' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
  ]);
  $admin = Admin::where('id', $id)->first();
  // dd($admin);
    DB::beginTransaction();
    try {
      $admin->username = $request->username;
      $admin->password = Crypt::encryptString($request->password);
      $admin->level = $request->level;
      $admin->email = $request->email;
      $admin->save();

      DB::commit();

      return redirect()
        ->route('admin.index')
        ->with('success', 'Sukses menambahkan Data');
  } catch (\Throwable $th) {

    dd($th);
    DB::rollBack();
    return redirect()
      ->route('karyawan.add')
      ->with('error', 'Gagal menambahkan Data');
  }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $admin = Admin::where('id', $id)->first();
    DB::beginTransaction();
    try {
      $admin->delete();
      DB::commit();
      return redirect()
        ->route('admin.index')
        ->with('success', 'Sukses Menghapus Data');
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect()
        ->route('admin.index')
        ->with('error', 'Gagal Mengubah Data');
    }
  }
}
