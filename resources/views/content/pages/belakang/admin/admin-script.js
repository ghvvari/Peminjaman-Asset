'use strict';

$(function () {
  // const select2 = $('.select2'),
  //   selectPicker = $('.selectpicker');

  // // Bootstrap select
  // if (selectPicker.length) {
  //   selectPicker.selectpicker();
  // }

  // // select2
  // if (select2.length) {
  //   select2.each(function () {
  //     var $this = $(this);
  //     $this.wrap('<div class="position-relative"></div>');
  //     $this.select2({
  //       placeholder: 'Select value',
  //       dropdownParent: $this.parent()
  //     });
  //   });
  // }

  $('#admin-modal').on('shown.bs.modal', function () {
    $('.select2add').select2({
        placeholder: 'Select value',
        dropdownParent: $(this).find('.modal-content') // Letakkan dropdown di dalam modal
    });
});


$('#username').change(function() {
  var username = $(this).val();
  let routeGetData = $('#password').data('route');
  
  $.ajax({
      url: routeGetData,
      method: 'GET',
      data: {
          username: username
      },
      success: function (response) {
          $('#password').val(response.password);
          $('#email').val(response.email);
      },
      error: function (xhr, status, error) {
          console.error(xhr);
      }
  });
});

$('.btn-edit').on('click', function (e) {
  e.preventDefault();
  let route = $(this).data('route');
  $.ajax({
    url: route,
    method: 'GET',
    type: 'JSON',
    success: function (res) {
      // Ganti elemen dengan respons
      $('.response').replaceWith(res);

      // Tampilkan modal
      $('.modal-edit').modal('show');

      // Inisialisasi select2 di dalam modal
      $('.select2').select2({
        placeholder: 'Select value',
        dropdownParent: $('.modal-edit')
      });
    }
  });
});

$('.btn-delete').on('click', function (e) {
  e.preventDefault();
  let route = $(this).data('route');
  Swal.fire({
    title: 'Apa Kamu Yakin Untuk Menghapus Data Admin?',
    text: 'Anda tidak dapat mengembalikannya!',
    icon: 'warning',
    showCancelButton: true,
    cancelButtonText: 'Batal',
    confirmButtonText: 'Yakin',
    customClass: {
      confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
      cancelButton: 'btn btn-label-secondary waves-effect waves-light'
    },
    buttonsStyling: false
  }).then((result) => {
    if (result.isConfirmed) {
      // Jika pengguna mengonfirmasi penghapusan, lakukan permintaan AJAX untuk menghapus data
      $.ajax({
          url: route,
          method: 'GET', // Gunakan metode DELETE untuk menghapus data
          success: function (response) {
            // Tampilkan SweetAlert bahwa data telah dihapus
            Swal.fire({
              title: 'Berhasil!!',
              text: 'Data Terhapus',
              type: 'success',
              icon: 'success',
              showConfirmButton: false,
              buttonsStyling: false
            })

            window.location.reload();

          },
          error: function (xhr, status, error) {
            console.error(xhr);
            // Tampilkan SweetAlert bahwa terjadi kesalahan saat menghapus data
            Swal.fire({
              title: 'Error',
              text: 'Terjadi Kesalahan Saat Menghapus Data',
              type: 'error',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })
          }
        });
      }
    });

  });

});




// $(function () {
//   $('#username').change(function () {
//     var username = $(this).val();
//     let routeGetData = $('#password').data('route');

//     $.ajax({
//       url: routeGetData,
//       method: 'GET',
//       data: {
//         username: username
//       },
//       success: function (response) {
//         console.log(response);
//         $('#password').val(response.password);
//         $('#email').val(response.email);
//       },
//       error: function (xhr, status, error) {
//         console.error(xhr);
//       }
//     });
//   });
// });
