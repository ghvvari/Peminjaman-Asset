@php
    $configData = Helper::custom();
@endphp

@extends('layouts/layoutMasterBelakang')
@section('title', 'Data Asset')


@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
  'resources/assets/vendor/libs/select2/select2.scss'

])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/select2/select2.js'

])
@endsection

@section('page-script')
@vite([
'resources\views\content\pages\belakang\data-asset\data-asset.js'

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
                          <h1> Add Asset Data </h1>
                      </div>
                      <div class ="card-body">
                        <form action="{{ route('asset.update', $aset->id )}}" method="POST">
                          @csrf
                        <div class="mb-3">
                          <label for="smallInput" class="form-label">Nama Asset</label>
                          <input id="smallInput" class="form-control rounded-pill" type="text" name="nama_aset" placeholder="Nama Asset" value="{{ $aset->nama_aset}}" />
                        </div>

                        <div class="mb-3">
                          <label for="smallInput" class="form-label">Serial Number</label>
                          <input id="smallInput" class="form-control rounded-pill" type="number" name="serial_number" placeholder="Serial Number" value="{{ $aset->serial_number}}" />
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control rounded-pill" name="tgl_beli" placeholder="YYYY-MM-DD" id="flatpickr-date" value="{{ $aset->tgl_beli}}"/>
                            <label for="floatingInput">Tanggal Beli</label>
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input class="form-control" type="file" name="foto_aset" id="formFile" value="{{ $aset->foto_aset}}">
                            <label for="floatingInput">Foto Asset</label>
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input class="form-control" type="file" id="formFile" name="scan_bon" value="{{ $aset->scan_bon}}">
                            <label for="floatingInput">Foto Bon Pemilik</label>
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input class="form-control" type="file" id="formFile" name="scan_milik" value="{{ $aset->scan_miliki}}">
                            <label for="floatingInput">Bukti Kepemilikan</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col mb-3">
                            <label class="form-label" for="">Unit Bisnis</label>
                            <select class="select2" data-style="btn-transparent" name="unit_bisnis" data-icon-base="ti" data-tick-icon="ti-check text-white">
                              @foreach ($unit_bisnis as $item)
                              <option value="{{ $item->unit_bisnis }}" {{ ($item->unit_bisnis == $aset->unit_bisnis)?'selected':'' }}>{{$item->unit_bisnis}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col mb-3">
                            <label class="form-label" for="">Pilih Penanggung Jawab</label>
                            <select class="select2" data-style="btn-transparent" data-icon-base="ti" name="posisi_saat_ini" data-tick-icon="ti-check text-white" value="{{$aset->posisi_saat_ini}}">
                              @foreach ($karyawan as $item)
                              <option value="{{ $item->nama_karyawan }}" {{ ($item->nama_karyawan == $aset->posisi_saat_ini)?'selected':'' }}>{{$item->nama_karyawan}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="input-group">
                          <span class="input-group-text">Deskripsi</span>
                          <textarea class="form-control" aria-label="With textarea" name="keterangan" placeholder="Deskripsi">{{$aset->keterangan}}</textarea>
                        </div>

                        <div class="col-12 d-flex justify-content-between mt-3">
                          <button class="btn btn-success btn-submit">Submit</button>
                        </div>
                      </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
