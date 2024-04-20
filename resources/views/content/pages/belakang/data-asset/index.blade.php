@php
    $configData = Helper::custom();
@endphp

@extends('layouts/layoutMasterBelakang')
@section('title', 'Data Asset')


@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss'

])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js',
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'

])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/extended-ui-sweetalert2.js',
  'resources/views/content/pages/belakang/data-asset/data-asset.js'
])
@endsection

@section('content')

         <div class="content-wrapper">
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
         </div>

@endsection
