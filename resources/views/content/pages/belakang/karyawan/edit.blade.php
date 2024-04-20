@php
    $configData = Helper::custom();
@endphp

@extends('layouts/layoutMasterBelakang')
@section('title', 'Karyawan')


@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/@form-validation/form-validation.scss',
  'resources/assets/vendor/libs/flatpickr/flatpickr.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.js',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js',
  'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js',
  'resources/assets/vendor/libs/flatpickr/flatpickr.js'

])
@endsection

@section('page-script')
@vite([
  // 'resources/assets/js/form-wizard-numbered.js',
  // 'resources/assets/js/form-wizard-validation.js',
  // 'resources/assets/js/forms-pickers.js'
  'resources/views/content/pages/belakang/karyawan/karyawan-script-edit.js'
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
          <div class="col-12 mb-4">
            <small class="text-light fw-medium">Basic</small>
            <div class="bs-stepper wizard-edit mt-2">
              <div class="bs-stepper-header">
                <div class="step" data-target="#account-details">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Detail Akun</span>
                      <span class="bs-stepper-subtitle">Detail Akun Pengaturan</span>
                    </span>
                  </button>
                </div>
                <div class="line">
                  <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#personal-info">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Informasi Pribadi</span>
                      <span class="bs-stepper-subtitle">Tambahnkan Informasi Pribadi </span>
                    </span>

                  </button>
                </div>

              </div>
              <div class="bs-stepper-content">
                <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" onSubmit="return false">
                  @csrf
                  <!-- Account Details -->
                  <div id="account-details" class="content">
                    <div class="content-header mb-3">
                      <h6 class="mb-0">Detail Akun</h6>
                      <small>Masukan Detail Akun.</small>
                    </div>
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ $karyawan->username }}"/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{ $karyawan->email }}" placeholder="john.doe@email.com" aria-label="john.doe" />
                        @error('email')
                        <div class="invalid-feedback">
                            email tidak valid
                        </div>
                      @enderror
                      </div>
                      <div class="col-sm-6 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                          <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="********">
                          <span class="input-group-text cursor-pointer" id="password2"><i class="ti ti-eye-off"></i></span>
                        </div>
                      </div>
                      <div class="col-md-6 form-password-toggle">
                        <label class="form-label" for="confirm-password">Confirm Password</label>
                        <div class="input-group input-group-merge">
                          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" value="{{ old('password_confirmation') }}" required autocomplete="new-password" placeholder="********">
                          <span class="input-group-text cursor-pointer" id="confirm-password2"><i class="ti ti-eye-off"></i></span>
                          @error('password')
                          <div class="invalid-feedback">
                              Password tidak sesuai
                          </div>
                        @enderror
                        </div>
                      </div>
                      <div class="col-12 d-flex justify-content-between">
                        <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                      </div>
                    </div>
                  </div>
                  <!-- Personal Info -->
                  <div id="personal-info" class="content">
                    <div class="content-header mb-3">
                      <h6 class="mb-0">Informasi Pribadi</h6>
                      <small>Masukan Informasi Pribadi.</small>
                    </div>
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label class="form-label" for="first-name">Nik</label>
                        <input type="number" name="nik" id="first-name" value="{{ $karyawan->nik }}"   class="form-control @error('nik') is-invalid @enderror" placeholder="Nik"/>
                        @error('nik')
                        <div class="invalid-feedback">
                            nik tidak valid
                        </div>
                      @enderror
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="last-name">Nama Karyawan</label>
                        <input type="text" id="" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{ $karyawan->nama_karyawan }}" />
                      </div>
                      <div class="col-sm-6">
                        <label for="flatpickr-date" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lahir" placeholder="Tahun-Bulan-Lahir" value="{{ $karyawan->tgl_lahir }}" id="flatpickr-date" />
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="last-name">No Telf</label>
                        <input type="number" id="" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ $karyawan->no_telp }}" placeholder="No Telf" />
                        @error('no_telp')
                        <div class="invalid-feedback">
                          no telf tidak valid
                        </div>
                      @enderror
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="language">Jabatan</label>
                        <select class="selectpicker w-100" name="jabatan" data-style="btn-transparent" value="{{ $karyawan->jabatan }}" data-icon-base="ti" data-tick-icon="ti-check text-white">
                          <option>Direksi</option>
                          <option>Project Manager</option>
                          <option>Staff</option>
                          <option>Substaff</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="language">Status Hubungan</label>
                        <select class="selectpicker w-100" name="status_hubungan" data-style="btn-transparent" value="{{ $karyawan->status_hubungan }}" data-icon-base="ti" data-tick-icon="ti-check text-white">
                          <option>Sudah Menikah</option>
                          <option>Belum Menikah</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="language">Unit Bisnis</label>
                        <select class="selectpicker w-100" name="unit_bisnis" data-style="btn-transparent" value="{{ $karyawan->unit_bisnis }}" data-icon-base="ti" data-tick-icon="ti-check text-white">
                          <option>PT KAN</option>
                          <option>PT KURASI</option>
                          <option>PT KII</option>
                          <option>CV KC</option>
                        </select>
                      </div>

                      <div class="row w-50 mt-4">
                        <div class="col-sm-6">
                          <div class="form-check form-check-success custom-option custom-option-basic">
                            <label class="form-check-label custom-option-content" for="customRadioVTemp1">
                              <input name="jenis_kelamin" class="form-check-input" type="radio" value="pria" {{ $karyawan->jenis_kelamin == 'pria' ? 'checked' : '' }} id="customRadioVTemp1" checked />
                              <span class="custom-option-header">
                                <span class="fw-medium">Pria</span>
                              </span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md">
                          <div class="form-check form-check-success custom-option custom-option-basic">
                            <label class="form-check-label custom-option-content" for="customRadioVTemp2">
                              <input name="jenis_kelamin" class="form-check-input" type="radio" value="wanita" {{ $karyawan->jenis_kelamin == 'wanita' ? 'checked' : '' }} id="customRadioVTemp2" />
                              <span class="custom-option-header">
                                <span class="fw-medium">Wanita</span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>


                      <div class="input-group">
                        <span class="input-group-text">Alamat</span>
                        <textarea class="form-control" aria-label="With textarea" name="alamat" placeholder="Masukan Alamat "> {{ $karyawan->alamat }} </textarea>
                      </div>

                      {{-- <div class="row w-25 mt-5">
                        <div class="col-md mb-md-0 mb-2">
                          <div class="form-check form-check-success custom-option custom-option-basic">
                            <label class="form-check-label custom-option-content" for="customRadioVTemp1">
                              <input name="customRadioVariants" class="form-check-input" type="radio" value="" id="customRadioVTemp1" checked />
                              <span class="custom-option-header">
                                <span class="fw-medium">Basic</span>
                              </span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md">
                          <div class="form-check form-check-success custom-option custom-option-basic">
                            <label class="form-check-label custom-option-content" for="customRadioVTemp2">
                              <input name="customRadioVariants" class="form-check-input" type="radio" value="" id="customRadioVTemp2" />
                              <span class="custom-option-header">
                                <span class="fw-medium">Premium</span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div> --}}

                      {{-- <div class="col-sm-6">
                        <label class="form-label" for="language">Language</label>
                        <select class="selectpicker w-auto" id="language" data-style="btn-transparent" data-icon-base="ti" data-tick-icon="ti-check text-white" multiple>
                          <option>English</option>
                          <option>French</option>
                          <option>Spanish</option>
                        </select>
                      </div> --}}

                      <div class="col-12 d-flex justify-content-between">
                        <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-success btn-submit" type="submit" >Submit</button>
                      </div>
                    </div>
                  </div>
                  <!-- Social Links -->
                  {{-- <div id="social-links" class="content">
                    <div class="content-header mb-3">
                      <h6 class="mb-0">Social Links</h6>
                      <small>Enter Your Social Links.</small>
                    </div>
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label class="form-label" for="twitter">Twitter</label>
                        <input type="text" id="twitter" class="form-control" placeholder="https://twitter.com/abc" />
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="facebook">Facebook</label>
                        <input type="text" id="facebook" class="form-control" placeholder="https://facebook.com/abc" />
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="google">Google+</label>
                        <input type="text" id="google" class="form-control" placeholder="https://plus.google.com/abc" />
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="linkedin">LinkedIn</label>
                        <input type="text" id="linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
                      </div>
                      <div class="col-12 d-flex justify-content-between">
                        <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>

                      </div>
                    </div>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>

</body>

</html>

@endsection
