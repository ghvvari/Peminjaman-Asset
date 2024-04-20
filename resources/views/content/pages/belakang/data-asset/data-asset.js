'use strict';

(function () {
  // Flat Picker
  // --------------------------------------------------------------------

  const flatpickrDate = document.querySelector('#flatpickr-date');

  // Date
  if (flatpickrDate) {
    flatpickrDate.flatpickr({
      monthSelectorType: 'static'
    });
  }
})();

$(function () {
  const select2 = $('.select2'),
    selectPicker = $('.selectpicker');

  // Bootstrap select
  if (selectPicker.length) {
    selectPicker.selectpicker();
  }

  // select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: 'Select value',
        dropdownParent: $this.parent()
      });
    });
  }
});

$(function () {
  let indexAsset = $('.tableAsset');

  if (indexAsset.length) {
    let routeAsset = indexAsset.data('route');
    indexAsset.DataTable({
      processing: true,
      serverSide: true,
      initComplete: function () {
        $('.btn-delete').on('click', function (e) {
          e.preventDefault();
          let form = $(this).closest('form');
          console.log(form);
          Swal.fire({
            title: 'Apa Kamu Yakin Untuk Menghapus Data Asset?',
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
          }).then(function (result) {
            if (result.value) {
              form.submit();
            }
          });
        });
      },
      ajax: {
        url: routeAsset,
        type: 'GET'
      },
      columns: [
                { data: 'id', name: 'id' },
                { data: 'nama_aset', name: 'nama_aset' },
                { data: 'tgl_beli', name: 'tgl_beli' },
                { data: 'serial_number', name: 'serial_number' },
                { data: 'posisi_saat_ini', name: 'posisi_saat_ini' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'status-badge'},
                { data: 'unit_bisnis', name: 'unit_bisnis' },
                { name: 'Aksi',
                render: function (data, type, aset) {
                  return `<div class="d-flex align-items-center gap-2">
                  ${aset.detail + aset.edit + aset.delete}
                  </div>`;
                }
              }
      ],
      pageLength: 25
    });
  }

  $('.zoom').on('onmousemove', function(e) {
    var zoomer = e.currentTarget;
    // console.log(zoomer);
    var offsetX = e.offsetX || e.touches[0].pageX;
    var offsetY = e.offsetY || e.touches[0].pageY;
    var x = offsetX / zoomer.offsetWidth * 100;
    var y = offsetY / zoomer.offsetHeight * 100;
    zoomer.style.backgroundPosition = x + '% ' + y + '%';
  });

});
