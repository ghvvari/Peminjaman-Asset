@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
@section('title', 'Page 2')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss'

])
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

    <div class="col">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class ="card-header">
                <h1> Peminjaman Asset </h1>
                <p> Aset Perusahaan Yang Anda Pinjam </p>
            </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover tableAsset" data-route="{{ route('data-asset.indexJSON') }}">
                      <thead class="fw-bolder fs-5">
                        <th>No</th>
                        <th class="min-w-100px">Nama Aset</th>
                        <th class="min-w-100px">Nomor Seri</th>
                        <th class="min-w-100px">Pemegang Sekarang</th>
                        <th class="min-w-100px">Posisi Saat Ini</th>
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

    {{-- <div class="content-wrapper">
      <div class="section-content">
          <div class = "container-fluid">
                <div class ="row">
                  <div class = "col-12">
                      <div class = "card">
                          <div class ="card-header d-flex align-items-center justify-content-between">
                              <h1> Data Asset </h1>
                              <a href="{{ route('asset.add')}}" class="btn btn-primary"> + Data Asset  </a>
                          </div>
                          <div class ="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-hover tableAsset" data-route="{{ route('data-asset.indexJSON') }}">
                                  <thead class="fw-bolder fs-5">
                                    <th>ID</th>
                                    <th class="min-w-100px">Nama Aset</th>
                                    <th class="min-w-100px">Tanggal Beli</th>
                                    <th class="min-w-100px">Serial Number</th>
                                    <th class="min-w-100px">Posisi Saat Ini</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Unit Bisnis</th>
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
   </div> --}}

</body>
@endsection
