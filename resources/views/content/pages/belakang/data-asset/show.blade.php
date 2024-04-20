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
  'resources/assets/css/asset-style.css',
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
                                    <h1> Detail Asset </h1>

                                </div>
                                <div class ="card-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="fw-bolder fs-5">
                                          <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Nama Asset</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">{{$aset->nama_aset}}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Nomor Serial</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">{{$aset->serial_number}}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Unit Bisnis</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">{{$aset->unit_bisnis}}
                                                {{-- @php
                                                    $unit_bisnis = $asset_yang_dipegang->id_unit_bisnis;
                                                    $unit_bisnis = App\DataBisnis::where('id', '=', $unit_bisnis)->first();
                                                    if ($unit_bisnis != null) {
                                                        $nama_bisnis = $unit_bisnis->nama_bisnis;
                                                    } else {
                                                        $nama_bisnis = '-';
                                                    }
                                                @endphp

                                                {{ $nama_bisnis }} --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- @php
                                                $tgl_beli = strtotime($asset_yang_dipegang->tgl_beli);
                                                $tgl_beli = date('l d F Y', $tgl_beli);
                                            @endphp --}}
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Purchase Date</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">{{$aset->tgl_beli}}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Posisi Saat Ini</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">{{$aset->posisi_saat_ini}}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Foto Asset</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">
                                              @if ($aset->foto_aset == null)
                                                  -
                                              @else
                                                  <span role="button" class="badge rounded-pill bg-primary bg-glow" data-bs-toggle="modal" data-bs-target="#open-foto-aset">click to view</span>
                                              @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Foto Bon Pembelian</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">
                                                @if ($aset->scan_bon == null)
                                                    -
                                                @else
                                                    <span role="button" class="badge rounded-pill bg-primary bg-glow" data-bs-toggle="modal" data-bs-target="#scanbon-modal">click to view</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Bukti Kepemilikan</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">
                                                @if ($aset->scan_milik == null)
                                                    -
                                                @else
                                                    <span role="button" class="badge rounded-pill bg-primary bg-glow" data-bs-toggle="modal" data-bs-target="#open-scan-milik">click to view</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="px-3 w-50" style="border: 1px solid #ccc !important">Deskripsi</th>
                                            <td class="px-3 w-50" style="border: 1px solid #ccc !important">{{$aset->keterangan}}
                                                {{-- @if ($asset_yang_dipegang->keterangan == "" || $asset_yang_dipegang->keterangan == null)
                                                    -
                                                @else
                                                    {{ $asset_yang_dipegang->keterangan }}
                                                @endif --}}
                                            </td>
                                        </tr>
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

         <div class="content-wrapper mt-5"
          <div class="section-content">
              <div class = "container-fluid">
                    <div class ="row">
                      <div class = "col-12">
                          <div class = "card">
                            <div class ="card-header d-flex align-items-center justify-content-between">
                              <h3> Log Penyerahan Asset </h3>
                              <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Export to pdf" id="btn-export-pdf">
                                <i class="fa-solid fa-file-pdf" style="font-size: 18px"></i>
                            </button>
                          </div>
                              <div class = "card-body">

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>



        <div class="modal fade" tabindex="-1" id="scanbon-modal">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="row mb-5">
                          <div class="col-lg-12 ">
                              <figure class="zoom" style="background-image: url({{ asset('storage/' . $aset->scan_bon)}})">
                                <img src="{{ asset('storage/'. $aset->scan_bon)}}">
                              </figure>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-12">
                              {{-- <a href="{{ route('assetLending.img-download', [$aset->id_aset, 1]) }}" class="btn btn-sm btn-success w-100" id="btn_download_scan_purchase">
                                  <i class="fas fa-download"></i> Download
                              </a> --}}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" tabindex="-1" id="open-foto-aset">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row mb-5">
                        <div class="col-lg-12 ">
                            <figure class="zoom" style="background-image: url({{ asset('storage/' . $aset->foto_aset)}})">
                              <img src="{{ asset('storage/'. $aset->foto_aset)}}">
                            </figure>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            {{-- <a href="{{ route('assetLending.img-download', [$aset->id_aset, 1]) }}" class="btn btn-sm btn-success w-100" id="btn_download_scan_purchase">
                                <i class="fas fa-download"></i> Download
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="open-scan-milik">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="row mb-5">
                      <div class="col-lg-12 ">
                          <figure class="zoom" style="background-image: url({{ asset('storage/' . $aset->scan_milik)}})">
                            <img src="{{ asset('storage/'. $aset->scan_milik)}}">
                          </figure>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-lg-12">
                          {{-- <a href="{{ route('assetLending.img-download', [$aset->id_aset, 1]) }}" class="btn btn-sm btn-success w-100" id="btn_download_scan_purchase">
                              <i class="fas fa-download"></i> Download
                          </a> --}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
