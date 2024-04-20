<?php

namespace App\Http\Controllers\Belakang;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\Karyawan;
use App\Models\UnitBisnis;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('content.pages.belakang.data-asset.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function indexJson()
  {
    $Asset = Aset::all();
    return DataTables::of($Asset)
      ->addIndexColumn()
      ->addColumn('status-badge', function($aset){
        if ($aset->aktif == 1) {
            return '<span class="badge rounded-pill bg-label-success">Active</span>';
        } elseif($aset->aktif == 0){
            return '<span class="badge rounded-pill bg-label-danger">Not Active</span>';
        }
    })
    ->addColumn('detail', function($aset){
      return '
          <a href="' . route('asset.show', $aset->id) . '" class="btn btn-sm btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Detail">
          <span class="svg-icon svg-icon-light svg-icon-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358
                      17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423
                      5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                  </svg>
              </span>
          </a>';
  })
    ->addColumn('edit', function($aset){
      return '
      <a href="' . route('asset.edit', $aset->id) . '" type="button" data-route="" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Edit">
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

  ->addColumn('delete', function($aset){
    return '
    <form action="' . route('aset.delete', $aset->id) . '" method="POST" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Delete">
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
      ->rawColumns(['status-badge','edit','detail','delete'])
      ->toJson();

  }

  public function create()
  {
    $unit_bisnis = UnitBisnis::all();
    $karyawan = Karyawan::all();
    return view('content.pages.belakang.data-asset.add', compact(['unit_bisnis', 'karyawan']));
  }

  /**
   * Store a newly created resource in storage.
   */

  public function store(Request $request)
  {
        // return $request->all();
    $request->validate([
      'nama_aset' => ['required'],
      'serial_number' => ['required'],
      'tgl_beli' => ['required'],
      // 'foto_aset' => ['required'],
      'unit_bisnis' => ['required'],
      'foto_aset' => ['required'],
      'posisi_saat_ini' => ['required'],
    ]);

    if ($request->hasFile('foto_aset')) { // Gunakan hasFile() untuk memeriksa apakah file ada
      $nameFile = date('Y-m-d-') . $request->file('foto_aset')->hashName();
      $FotoAsset = $request->file('foto_aset')->storeAs('/dataAsset/FotoAsset', $nameFile,['disk' => 'public']);

  } else {
      $FotoAsset = "";
  }
    if ($request->hasFile('scan_bon')) { // Gunakan hasFile() untuk memeriksa apakah file ada
      $nameFile = date('Y-m-d-') . $request->file('scan_bon')->hashName();
      $FotoBon = $request->file('scan_bon')->storeAs('/dataAsset/FotoBon', $nameFile,['disk' => 'public']);

  } else {
      $FotoBon= "";
  }
    if ($request->hasFile('scan_milik')) { // Gunakan hasFile() untuk memeriksa apakah file ada
      $nameFile = date('Y-m-d-') . $request->file('scan_milik')->hashName();
      $Scan_milik = $request->file('scan_milik')->storeAs('/dataAsset/ScanMilik', $nameFile,['disk' => 'public']);

    } else {
      $Scan_milik = "";
    }
    DB::beginTransaction();
    try {
      $aset = new aset;
      $aset->nama_aset = $request->nama_aset;
      $aset->serial_number = $request->serial_number;
      $aset->tgl_beli = $request->tgl_beli;
      $aset->foto_aset = $FotoAsset;
      $aset->scan_bon = $FotoBon;
      $aset->scan_milik = $Scan_milik;
      $aset->unit_bisnis = $request->unit_bisnis;
      $aset->posisi_saat_ini = $request->posisi_saat_ini;
      $aset->keterangan = $request->keterangan;
      $aset->save();

      DB::commit();

      return redirect()
        ->route('asset.index')
        ->with('success', 'Sukses menambahkan Data');
    } catch (\Throwable $th) {
      dd($th);
      DB::rollBack();
      return redirect()
        ->route('asset.add')
        ->with('error', 'Gagal menambahkan Data');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $aset = Aset::where('id', $id)->first();
    return view('content.pages.belakang.data-asset.show',compact(['aset']));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $aset = Aset::where('id', $id)->first();
    $unit_bisnis = UnitBisnis::all();
    $karyawan = Karyawan::all();
    return view('content.pages.belakang.data-asset.edit', compact(['aset','unit_bisnis','karyawan']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'nama_aset' => ['required'],
      'serial_number' => ['required'],
      'tgl_beli' => ['required'],
      'unit_bisnis' => ['required'],
      'posisi_saat_ini' => ['required'],
  ]);

    $aset = Aset::where('id', $id)->first();

    DB::beginTransaction();
    try {
        $aset->nama_aset = $request->nama_aset;
        $aset->serial_number = $request->serial_number;
        $aset->tgl_beli = $request->tgl_beli;
        $aset->unit_bisnis = $request->unit_bisnis;
        $aset->posisi_saat_ini = $request->posisi_saat_ini;
        $aset->keterangan = $request->keterangan;

        if ($request->hasFile('foto_aset')) {
            $nameFile = date('Y-m-d-') . $request->file('foto_aset')->hashName();
            $FotoAsset = $request->file('foto_aset')->storeAs('/dataAsset/FotoAsset', $nameFile,['disk' => 'public']);
            $aset->foto_aset = $FotoAsset;
        }

        if ($request->hasFile('scan_bon')) {
            $nameFile = date('Y-m-d-') . $request->file('scan_bon')->hashName();
            $FotoBon = $request->file('scan_bon')->storeAs('/dataAsset/FotoBon', $nameFile,['disk' => 'public']);
            $aset->scan_bon = $FotoBon;
        }

        if ($request->hasFile('scan_milik')) {
            $nameFile = date('Y-m-d-') . $request->file('scan_milik')->hashName();
            $Scan_milik = $request->file('scan_milik')->storeAs('/dataAsset/ScanMilik', $nameFile,['disk' => 'public']);
            $aset->scan_milik = $Scan_milik;
        }

        $aset->save();

        DB::commit();

        return redirect()
            ->route('asset.index')
            ->with('success', 'Sukses memperbarui Data');
    } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()
            ->route('asset.edit', $id)
            ->with('error', 'Gagal memperbarui Data');
    }

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $aset = Aset::where('id', $id)->first();
      DB::beginTransaction();
      try {
        $aset->delete();
        DB::commit();
        return redirect()
          ->route('asset.index')
          ->with('success', 'Sukses Menghapus Data');
      } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()
          ->route('asset.index')
          ->with('error', 'Gagal Mengubah Data');
      }
  }
}
