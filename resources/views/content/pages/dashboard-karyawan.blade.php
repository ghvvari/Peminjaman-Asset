@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
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
          <div class="col-md-3">
            <div class="card" style="height: 15rem">
              <div class="card-body">
                <div class="col md-3 d-flex justify-content-center" >
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" width="150px"/>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                  <div class="justify-content">
                    <h1> Pegawai 1 </h1>
                  </div>

                  <div class="justify-content">
                    <div class="d-flex">
                      <div class="d-flex align-item-center">
                        <img src="https://png.pngtree.com/png-clipart/20230927/original/pngtree-man-avatar-image-for-profile-png-image_13001882.png" width="50px" alt="Avatar">
                      </div>

                      <div class="d-flex align-item-center">
                        <p class="d-flex">Project Manager</p>
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
