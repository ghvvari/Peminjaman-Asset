<?php

namespace App\Http\Controllers\Belakang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\UnitBisnis;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view ('content.pages.belakang.karyawan.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function indexJson() {
    $karyawan = Karyawan::all();
    return DataTables::of($karyawan)
      ->addIndexColumn()
      ->addColumn('edit', function($karyawan){
        return '
        <a href="' . route('karyawan.edit', $karyawan->id) . '" type="button" data-route="" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Edit">
        <span class="svg-icon svg-icon-light svg-icon-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163
                5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467
                18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218
                2 19.3684V4.63158Z" fill="currentColor"/>
                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479
                1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154
                11.5055 8.82343 12.0064Z" fill="currentColor"/>
            </svg>
        </span>
      </a>';
    })

    ->addColumn('delete', function($karyawan){
      return '
      <form action="' . route('karyawan.delete', $karyawan->id) . '" method="POST" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Delete">
      ' . csrf_field() . '
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-sm btn-icon btn-delete btn-danger">
      <span class="svg-icon svg-icon-light svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
          <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
          <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
      </svg>
      </form>
  </span>';
  })
        ->rawColumns(['status-badge','edit','delete'])
      ->toJson();
    }


    public function create()
    {
      $unit_bisnis = UnitBisnis::all();
      return view ('content.pages.belakang.karyawan.addkaryawan', compact(['unit_bisnis']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|confirmed', // Biarkan aturan password seperti itu
        'nik' => 'required|string|max:255',
        'nama_karyawan' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'no_telp' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'status_hubungan' => 'required|string|max:255',
        'unit_bisnis' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:pria,wanita', // Biarkan aturan jenis_kelamin seperti itu
        'alamat' => 'required|string',
    ]);

    DB::beginTransaction();
    try {
      $karyawan = new Karyawan();
      $karyawan->username = $request->username;
      $karyawan->email = $request->email;
      $karyawan->password = bcrypt($request->password);
      $karyawan->nik = $request->nik;
      $karyawan->nama_karyawan = $request->nama_karyawan;
      $karyawan->tgl_lahir = $request->tgl_lahir;
      $karyawan->no_telp = $request->no_telp;
      $karyawan->jabatan = $request->jabatan;
      $karyawan->status_hubungan = $request->status_hubungan;
      $karyawan->unit_bisnis = $request->unit_bisnis;
      $karyawan->jenis_kelamin = $request->jenis_kelamin;
      $karyawan->alamat = $request->alamat;
      $karyawan->save();

      DB::commit();

      return redirect()
        ->route('karyawan.index')
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
      $karyawan = Karyawan::where('id', $id)->first();
      return view('content.pages.belakang.karyawan.edit', compact(['karyawan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      // return $request->all();
      $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|confirmed', // Biarkan aturan password seperti itu
        'nik' => 'required|string|max:255',
        'nama_karyawan' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'no_telp' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'status_hubungan' => 'required|string|max:255',
        'unit_bisnis' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:pria,wanita', // Biarkan aturan jenis_kelamin seperti itu
        'alamat' => 'required|string',
      ]);

      $karyawan = Karyawan::where('id', $id)->first();
      $password = ($request->password) ? bcrypt($request->password) : $karyawan->password;

      DB::beginTransaction();
      try {
        $karyawan->username = $request->username;
        $karyawan->email = $request->email;
        $karyawan->password = $password;
        $karyawan->nik = $request->nik;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->tgl_lahir = $request->tgl_lahir;
        $karyawan->no_telp = $request->no_telp;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->status_hubungan = $request->status_hubungan;
        $karyawan->unit_bisnis = $request->unit_bisnis;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        DB::commit();
        return redirect()
          ->route('karyawan.index')
          ->with('success', 'Sukses menambahkan Data');
      } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()
          ->route('karyawan.edit')
          ->with('error', 'Gagal menambahkan Data');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $karyawan = Karyawan::where('id', $id)->first();
      DB::beginTransaction();
      try {
        $karyawan->delete();
        DB::commit();
        return redirect()
          ->route('karyawan.index')
          ->with('success', 'Sukses Menghapus Data');
      } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()
          ->route('karyawan.index')
          ->with('error', 'Gagal Mengubah Data');
      }
    }
}
