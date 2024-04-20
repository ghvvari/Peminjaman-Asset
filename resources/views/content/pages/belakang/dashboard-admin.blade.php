@php
    $configData = Helper::custom();
@endphp

@extends('layouts/layoutMasterBelakang')
@section('title', 'Home')


@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/extended-ui-sweetalert2.js'
])
@endsection

@section('content')
<html lang="en">
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Dashboard - Card Template</title>
            <!-- Link ke Bootstrap CSS -->
        </head>
        <body>
              <div class="content-wrapper">
                <div class="section-content">
                    <div class = "container-fluid">
                          <div class ="row">
                            <div class = "col-12">
                                <div class="row g-4 mb-4">
                                    <div class="col-sm-5 col-md-6">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="d-flex align-items-start justify-content-between">
                                            <div class="content-left">
                                              <span>Karyawan</span>
                                              <div class="d-flex align-items-end mt-2">
                                                <h3 class="mb-0 me-2">{{$totalKaryawan}}</h3>
                                              </div>
                                              <small>Total Karyawan</small>
                                            </div>
                                            <span class="badge bg-label-primary rounded p-2">
                                              <i class="ti ti-user ti-sm"></i>
                                            </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-5 col-md-6">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="d-flex align-items-start justify-content-between">
                                            <div class="content-left">
                                              <span>Asset</span>
                                              <div class="d-flex align-items-end mt-2">
                                                <h3 class="mb-0 me-2">{{$totalAset}}</h3>
                                              </div>
                                              <small>Total Asset</small>
                                            </div>
                                            <span class="badge bg-label-success rounded p-2">
                                              <i class="ti ti-door ti-sm"></i>
                                            </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>

         <div class="content-wrapper">
            <div class="section-content">
                <div class = "container-fluid">
                      <div class ="row">
                        <div class = "col-12">
                            <div class = "card">
                                <div class = "card-header">
                                    <h1> Data Asset</h1>
                                </div>
                                <div class = "card-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-hover tableAsset">
                                        <thead class="fw-bolder fs-5">
                                          <th>ID</th>
                                          <th class="min-w-100px">Nama Aset</th>
                                          <th class="min-w-100px">Tanggal Beli</th>
                                          <th class="min-w-100px">Serial Number</th>
                                          <th class="min-w-100px">Posisi Saat Ini</th>
                                          <th>Keterangan</th>
                                          <th>Status</th>
                                          <th>Unit Bisnis</th>
                                        </thead>
                                        <tbody>
                                          @foreach ($aset as $item)
                                          <tr>
                                              <td>{{$item->id}}</td>
                                              <td>{{$item->nama_aset}}</td>
                                              <td>{{$item->tgl_beli}}</td>
                                              <td>{{$item->serial_number}}</td>
                                              <td>{{$item->posisi_saat_ini}}</td>
                                              <td>{{$item->keterangan}}</td>
                                              <td>
                                                @if ($item->aktif == 1)
                                                  <span class="badge rounded-pill bg-label-success">Active</span>
                                               @elseif($item->aktif == 0)
                                                <span class="badge rounded-pill bg-label-danger">Not Active</span>
                                                @endif
                                              </td>
                                              <td>{{$item->unit_bisnis}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
</body>

</html>

@endsection
