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
                        <form enctype="multipart/form-data" action="{{ route('asset.store')}}" method="POST">
                          @csrf
                        <div class="mb-3">
                          <label for="smallInput" class="form-label">Nama Asset</label>
                          <input id="smallInput" class="form-control rounded-pill @error ('nama_aset') is-invalid @enderror" type="text" name="nama_aset" placeholder="Nama Asset" />
                          @error('nama_aset')
                            <div class="invalid-feedback">
                                field nama asset harus di isi
                              </div>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <label for="smallInput" class="form-label">Nomor Serial</label>
                          <input id="smallInput" class="form-control rounded-pill @error ('serial_number') is-invalid @enderror" type="number" name="serial_number" placeholder="Nomor Serial" />
                          @error('serial_number')
                            <div class="invalid-feedback">
                                field nomor serial harus di isi
                              </div>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control rounded-pill @error ('tgl_beli') is-invalid @enderror" name="tgl_beli" placeholder="YYYY-MM-DD" id="flatpickr-date"/>
                            <label for="floatingInput">Tanggal Beli</label>
                            @error('tgl_beli')
                            <div class="invalid-feedback">
                                field tanggal beli harus di isi
                              </div>
                          @enderror
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input class="form-control @error ('foto_aset') is-invalid @enderror" type="file" name="foto_aset" id="formFile" accept=".jpg, .jpeg, .png">
                            <label for="floatingInput">Foto Asset</label>
                            @error('foto_aset')
                            <div class="invalid-feedback">
                                field foto asset harus di isi
                              </div>
                          @enderror
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input class="form-control" type="file" id="formFile" name="scan_bon" accept=".jpg, .jpeg, .png">
                            <label for="floatingInput">Foto Bon Pemilik</label>
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-floating">
                            <input class="form-control" type="file" id="formFile" name="scan_milik" accept=".jpg, .jpeg, .png">
                            <label for="floatingInput">Bukti Kepemilikan</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col mb-3">
                            <label class="form-label" for="">Unit Bisnis</label>
                            <select class="select2" data-style="btn-transparent" name="unit_bisnis" data-icon-base="ti" data-tick-icon="ti-check text-white">
                              <option value=""></option>
                              @foreach ($unit_bisnis as $item)
                              <option value="{{$item->unit_bisnis}}">{{$item->unit_bisnis}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col mb-3">
                            <label class="form-label" for="">Pilih Penanggung Jawab</label>
                            <select class="select2" data-style="btn-transparent" data-icon-base="ti" name="posisi_saat_ini" data-tick-icon="ti-check text-white">
                              <option value=""></option>
                              @foreach ($karyawan as $item)
                              <option value="{{ $item->nama_karyawan }}" {{ (old('posisi_saat_ini') == $item->nama_karyawan)?'selected':'' }}>{{$item->nama_karyawan}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="input-group">
                          <span class="input-group-text">Deskripsi</span>
                          <textarea class="form-control" aria-label="With textarea" name="keterangan" placeholder="Deskripsi"></textarea>
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
