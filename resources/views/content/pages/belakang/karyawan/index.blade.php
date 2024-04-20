@php
    $configData = Helper::custom();
@endphp

@extends('layouts/layoutMasterBelakang')
@section('title', 'Karyawan')


@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss'

])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'
])
@endsection

@section('page-script')
@vite([
  // 'resources/assets/js/extended-ui-sweetalert2.js',
  'resources/views/content/pages/belakang/karyawan/karyawan-script.js'
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
                            <div class = "card">
                                <div class ="card-header d-flex align-items-center justify-content-between">
                                    <h1> Data Karyawan </h1>
                                    <a href="{{ route('karyawan.add')}}" class="btn btn-primary"> + Data Karyawan  </a>
                                </div>
                                <div class ="card-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-hover tableKaryawan" data-route="{{ route('data-karyawan.indexJSON') }}">
                                        <thead class="fw-bolder fs-5">
                                            <th>ID</th>
                                            <th>Unit Bisnis</th>
                                            <th>Username</th>
                                            <th>Nama </th>
                                            <th>Jabatan</th>
                                            <th>Nik</th>
                                            <th>Gender</th>
                                            <th>No telf</th>
                                            <th>Status Hubungan</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
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
