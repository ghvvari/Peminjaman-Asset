/**
 *  Form Wizard
 */

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

//select 2
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
//datatable
$(function () {
  let indexKaryawan = $('.tableKaryawan');

  if (indexKaryawan.length) {
    let routeKaryawan = indexKaryawan.data('route');
    indexKaryawan.DataTable({
      processing: true,
      serverSide: true,
      initComplete: function () {
        $('.btn-delete').on('click', function (e) {
          e.preventDefault();
          let form = $(this).closest('form');
          Swal.fire({
            title: 'Apa Kamu Yakin Untuk Menghapus Data Karyawan?',
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
        url: routeKaryawan,
        type: 'GET'
      },
      columns: [
              { data: 'id', name: 'id' },
              { data: 'unit_bisnis', name: 'unit_bisnis' },
              { data: 'username', name: 'username' },
              { data: 'nama_karyawan', name: 'nama_karyawan' },
              { data: 'jabatan', name: 'jabatan' },
              { data: 'nik', name: 'nik' },
              { data: 'jenis_kelamin', name: 'jenis_kelamin' },
              { data: 'no_telp', name: 'no_telp' },
              { data: 'status_hubungan', name: 'status_hubungan' },
              { name: 'Aksi',
                render: function (data, type, karyawan) {
                  return `<div class="d-flex align-items-center gap-2">
                  ${ karyawan.edit + karyawan.delete}
                  </div>`;
                }
              }
      ],
      pageLength: 25
    });
  }
});

//wizard
(function () {
  // Numbered Wizard
  // --------------------------------------------------------------------
  const wizardNumbered = document.querySelector('.wizard-numbered'),
    wizardNumberedBtnNextList = [].slice.call(wizardNumbered.querySelectorAll('.btn-next')),
    wizardNumberedBtnPrevList = [].slice.call(wizardNumbered.querySelectorAll('.btn-prev')),
    wizardNumberedBtnSubmit = wizardNumbered.querySelector('.btn-submit');

  if (typeof wizardNumbered !== undefined && wizardNumbered !== null) {
    const numberedStepper = new Stepper(wizardNumbered, {
      linear: false
    });
    if (wizardNumberedBtnNextList) {
      wizardNumberedBtnNextList.forEach(wizardNumberedBtnNext => {
        wizardNumberedBtnNext.addEventListener('click', event => {
          numberedStepper.next();
        });
      });
    }
    if (wizardNumberedBtnPrevList) {
      wizardNumberedBtnPrevList.forEach(wizardNumberedBtnPrev => {
        wizardNumberedBtnPrev.addEventListener('click', event => {
          numberedStepper.previous();
        });
      });
    }
    if (wizardNumberedBtnSubmit) {
      wizardNumberedBtnSubmit.addEventListener('click', event => {
        // alert('Submitted..!!');
        event.preventDefault();
      // Mengirimkan formulir secara manual
      const form = document.querySelector('form');
      form.submit();
      });
    }
  }

})();

//wizard edit
(function () {
  // Numbered Wizard
  // --------------------------------------------------------------------
  const wizardEdit = document.querySelector('.wizard-edit'),
    wizardEditBtnNextList = [].slice.call(wizardEdit.querySelectorAll('.btn-next')),
    wizardEditBtnPrevList = [].slice.call(wizardEdit.querySelectorAll('.btn-prev')),
    wizardEditBtnSubmit = wizardEdit.querySelector('.btn-submit');

  if (typeof wizardEdit !== undefined && wizardEdit !== null) {
    const numberedStepper = new Stepper(wizardEdit, {
      linear: false
    });
    if (wizardEditBtnNextList) {
      wizardEditBtnNextList.forEach(wizardEditBtnNext => {
        wizardEditBtnNext.addEventListener('click', event => {
          numberedStepper.next();
        });
      });
    }
    if (wizardEditBtnPrevList) {
      wizardEditBtnPrevList.forEach(wizardEditBtnPrev => {
        wizardEditBtnPrev.addEventListener('click', event => {
          numberedStepper.previous();
        });
      });
    }
    if (wizardEditBtnSubmit) {
      wizardEditBtnSubmit.addEventListener('click', event => {
        // alert('Submitted..!!');
        event.preventDefault();
      // Mengirimkan formulir secara manual
      const form = document.querySelector('form');
      form.submit();
      });
    }
  }

})();
